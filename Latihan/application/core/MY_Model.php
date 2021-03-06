<?php
require_once APPPATH."/third_party/Datatable.php";
/**
 * @property CI_DB_query_builder $db [<description>]
 */
class MY_Model extends CI_Model implements DatatableModel {

    use Datatable;

    CONST HAS_ONE = 10;
    CONST HAS_MANY = 11;

    private static $_models = array();

    /** @var String nama table * */
    protected $table = "";

    /** @var String|Integer nama primary key * */
    protected $pK = "";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * @return static
     */
    public static function model() {
        $class = get_called_class();
        return new $class;
    }

     /**
     * @ return
     *        Expressions / Columns to append to the select created by the Datatable library.
     *        Associative array where the key is the sql alias and the value is the sql expression
     */
    public function appendToSelectStr(){
    	return NULL;
    }

    /**
     * @return
     *      String table name to select from
     */
    public function fromTableStr(){
    	return static::$table_name;
    }

    /**
     * @return
     *     Associative array of joins.  Return NULL or empty array  when not joining
     */
    public function joinArray(){
    	return array();
    }

    /**
     *
     * @return
     *    Static where clause to be appended to all search queries.  Return NULL or empty array
     * when not filtering by additional criteria
     */
    public function whereClauseArray(){
    	return array();
    }
    
    function getDataGrid($request, $select = "*", $where = NULL) {
        $limit = $request['length'];
        $offset = $request['start'];
        $search = $request['search']['value'];
        $order = $request['order'];
//        $columnOrder = $request['columns'][$order['column']]['data'];
        foreach ($order as $o) {
            $columnOrder[] = array('dir' => $o['dir'], 'column' => $request['columns'][$o['column']]['data']);
        }
        if ($where != NULL) {
            foreach ($this->relations() as $alias => $relasi) {
                $and = '';
                if (isset($relasi[4])) {
                    $and = " AND $alias.$relasi[4] = $relasi[5]";
                }
                if ($relasi[0] == self::HAS_ONE)
                    $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]$and", 'left');
            }
            $this->db->select("COUNT(*) as numrows");
            $this->db->where($where);
            $r = $this->db->get($this->table);
            $t = $r->result_array();
            $count = $t[0]['numrows'];
        } else
            $count = $this->db->count_all($this->table);

        $countFilter = $count;
        if ($search != null) {
            $having = array();
            foreach ($request['columns'] as $column) {
                if ($column['searchable'] == 'true')
                    if (isset($column['name']) && $column['name'] != NULL){
                        $t = explode("|",$column['name']);
                        foreach($t as $c)
                            $like[$c] = $search;
                    }
                    else
                        $like[$column['data']] = $search;
            }
            $this->db->select("COUNT(*) as numrows");
            $this->db->group_start();
            $this->db->or_like($like);
            $this->db->group_end();

            if ($where != NULL)
                $this->db->where($where);
            foreach ($this->relations() as $alias => $relasi) {$and = '';
                $and = '';
                if (isset($relasi[4])) {
                    $and = " AND $alias.$relasi[4] = $relasi[5]";
                }
                if ($relasi[0] == self::HAS_ONE){
                    $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]$and", 'left');
                }        
            }
            $r = $this->db->get($this->table);
            $t = $r->result_array();
            $countFilter = $t[0]['numrows'];
            $this->db->group_start();
            $this->db->or_like($like);
            $this->db->group_end();

        }

        if ($where != NULL)
            $this->db->where($where);

        $this->db->select($select);
        foreach ($columnOrder as $or) {
            $this->db->order_by($or['column'], $or['dir']);
        }

        if ($limit > 0)
            $this->db->limit($limit, $offset);

        foreach ($this->relations() as $alias => $relasi) {
            $and = '';
            if (isset($relasi[4])) {
                $and = " AND $alias.$relasi[4] = $relasi[5]";
            }
            if ($relasi[0] == self::HAS_ONE){
                $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]$and", 'left');
            }        
        }

        $result = $this->db->get($this->table);
        $data = $result->result_array();
        return array('recordsTotal' => $count, 'recordsFiltered' => $countFilter, 'data' => $data);
    }

    function getArrayProperty() {
        $property = get_object_vars($this);
        if ($property[$property['pK']])
            $property['new'] = FALSE;
        else
            $property['new'] = TRUE;

        unset($property['table'], $property['pK'], $property['db'], $property['db'], $property['rowIdCol'],
                $property['preResultFunc'], $property['matchType'], $property['protectIdentifiers']);
        return $property;
    }
    
    function insert($data) {
        unset($data['submit'], $data['Submit'], $data['new']);
        return $this->db->insert($this->table, $data);
    }

    function insertBatch($datas) {
        unset($datas['submit'], $datas['Submit'], $datas['new']);
        return $this->db->insert_batch($this->table, $datas);
    }

    function update($id, $data) {
        unset($data['submit'], $data['Submit'], $data['new']);
        if (is_array($id))
            $this->db->where($id);
        else
            $this->db->where($this->pK, $id);
        return $this->db->update($this->table, $data);
    }

    function delete($param) {
        if ($param != NULL) {
            if (is_array($param))
                $this->db->where($param);
            else
                $this->db->where($this->pK, $param);
            return $this->db->delete($this->table);
        }
    }

    function deleteJoin($param) {
        if ($param != NULL) {
            if (is_array($param))
                $this->db->where($param);
            else
                $this->db->where($this->pK, $param);

            foreach ($this->relations() as $alias => $relasi) {
                if ($relasi[0] == self::HAS_ONE)
                    $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]", "LEFT");
            }
            $query = $this->db->get_compiled_select($this->table);
            $query = str_replace("SELECT *", "DELETE $this->table", $query);
            return $this->db->query($query);
        }
    }

    function deleteAllByPk($ids) {
        if ($ids != NULL) {
            $this->db->where_in($this->pK, $ids);
            return $this->db->delete($this->table);
        }
    }

    function getByPrimary($id, $asArray = TRUE, $relation = FALSE, $where = NULL) {
        if ($id == NULL) {
            return NULL;
        }
        $this->db->where($this->pK, $id);
        if ($where != NULL) {
            $this->db->where($where);
        }
        if ($relation) {
            foreach ($this->relations() as $alias => $relasi) {
                if ($relasi[0] == self::HAS_ONE)
                    $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]", "LEFT");
            }
        }
        $query = $this->db->get($this->table);

        if ($asArray)
            $result = $query->row_array();
        else
            $result = $query->row(0, get_class($this));
        return $result;
    }

    /**
     * @param mixed $where 
     * @param boolean $asArray return hasil sebagai array
     * @return mixed
     */
    function getOne($where, $asArray = TRUE, $relation = FALSE) {
        if ($where == NULL) {
            return NULL;
        }
        $this->db->where($where);
        if ($relation) {
            foreach ($this->relations() as $alias => $relasi) {
                if ($relasi[0] == self::HAS_ONE)
                    $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]", 'left');
            }
        }
        $query = $this->db->get($this->table);

        if ($asArray)
            $result = $query->row_array();
        else
            $result = $query->row(0, get_class($this));
        return $result;
    }

    /**
     * @param array $param parameter select,where,sort,dan order
     * @return array
     */
    function getAll($param = NULL) {
        foreach ($this->relations() as $alias => $relasi) {
            if ($relasi[0] == self::HAS_ONE)
                $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]", 'left');
        }
        if (isset($param['select']))
            $this->db->select($param['select']);
        if (isset($param['where']))
            $this->db->where($param['where']);
        if (isset($param['sort'])) {
            if (isset($param['order']))
                $this->db->order_by($param['sort'], $param['order']);
            else
                $this->db->order_by($param['sort']);
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function getListData($key, $value, $where = NULL, $order = NULL, $placeholder = NULL) {
        $this->db->select(array($key, $value));
        if ($where != NULL)
            $this->db->where($where);
        if ($order != NULL)
            $this->db->order_by($order);
        foreach ($this->relations() as $alias => $relasi) {
            if ($relasi[0] == self::HAS_ONE)
                $this->db->join($relasi[1] . " as $alias", "$alias.$relasi[2] = $relasi[3]", "LEFT");
        }
        $query = $this->db->get($this->table);
        $result = $query->result_array();
        $return = array();
        if ($placeholder != NULL)
            $return = array('' => $placeholder);
        foreach ($result as $data) {
            $return[$data[$key]] = $data[$value];
        }
        return $return;
    }
    
    public function setAttribute($attribute) {
        unset($attribute['submit'], $attribute['Submit']);
        foreach ($attribute as $varName => $value) {
            $this->{$varName} = $value;
        }
    }


}
