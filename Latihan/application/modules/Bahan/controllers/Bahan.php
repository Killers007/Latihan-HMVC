<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahan extends MY_Controller {

	private $role='Bahan';

	public function __construct(){
		parent::__construct();
		if (!$this->acl->role_check($this->role,'BACA')) {
			$this->acl->no_access();
		}
	}

	public function _example_output($output = null){
		$this->template->render('index',(array)$output,$this->role);
	}

	public function index(){
		$this->__READ();
	}

	public function __READ(){
		try{
			$crud = new grocery_CRUD();
			// $crud->set_theme('datatables');
			$crud->set_table('silab_m_bahan');
			$crud->set_subject($this->role);
			$crud->set_relation('lab','silab_m_lab','nama_lab');
			(!$this->acl->role_check($this->role,'BACA'))?$crud->unset_read():'';
			(!$this->acl->role_check($this->role,'TULIS'))?$crud->unset_add():'';
			(!$this->acl->role_check($this->role,'HAPUS'))?$crud->unset_delete():'';
			(!$this->acl->role_check($this->role,'EDIT'))?$crud->unset_edit():'';
			$output = $crud->render();
			$this->_example_output($output);
		}catch(Exception $e){
			show_error($e->getMessage());
		}
	}


	public function to_word_backup(){
		$this->load->library('word');
		$PHPWord = $this->word; 
		$section = $PHPWord->createSection(); 

		$section->addText('Hello World!');
		$section->addTextBreak(2);
		$section->addText('Ahmad Juhdi.', array('name'=>'Verdana', 'color'=>'006699'));
		$section->addTextBreak(2);
		$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
		$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
		$section->addText('Ini Adalah Demo PHPWord untuk CI', 'rStyle', 'pStyle');

		$table = $section->addTable();

		$this->load->library('word');
		$data=$this->db->get('silab_m_fakultas')->result();

		foreach ($data as  $value) {
			$table->addRow();
			foreach ($value as $values) {
				$table->addCell(3000)->addText($values);
			}
		}

		
		$filename='PHPWord.docx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('php://output');
	}

	public function tes()
	{
		$args = func_get_args();
		echo "<pre>";
		print_r($args);
		echo "</pre>";
	}

	public function to_word(){
		$this->load->library('word');
		$data=$this->db->get('silab_m_bahan')->result();
		$PHPWord = $this->word; 
		$document = $PHPWord->loadTemplate('E:\xampp\htdocs\HMVC-CI\Latihan\Template.docx');

		$datas;
		foreach ($data as $key => $value) {
			foreach ($value as $keys => $values) {
				$datas[$keys][] = $values;
			}
		}
		
		// prepare data for tables
		// $data1 = array(
		// 	'num' => array(1,2,3),
		// 	'color' => array('red', 'blue', 'green'),
		// 	'code' => array('ff0000','0000ff','00ff00')
		// );	

		// clone rows	
		$document->cloneRow('TBL1', $datas);
		
		$temp_name=tempnam(sys_get_temp_dir(),'PHPWord');
		$document->save($temp_name);

		$filename='template.docx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Cache-Control: max-age=0'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		readfile($temp_name);
		unlink($temp_name);
	}

	public function to_excel(){
		$this->load->library('excel');
		$this->excel->render($this->db->get('silab_m_pengelola'));
	}

	public function template_excel(){
		$this->load->library('excel');
		
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load('E:\xampp\htdocs\HMVC-CI\Latihan\Template.xls');
		$data=$this->db->get('silab_m_bahan')->result();
		
		$datas;
		foreach ($data as $key => $value) {
			
				$datas[$key] = (array)$value;
			
		}

	// 	$data = array(array('title'		=> 'Excel for dummies',
	// 		'price'		=> 17.99,
	// 		'quantity'	=> 2
	// 	),
	// 	array('title'		=> 'PHP for dummies',
	// 		'price'		=> 15.99,
	// 		'quantity'	=> 1
	// 	),
	// );

		$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

		$baseRow = 5;
		foreach($datas as $r => $dataRow) {
			$row = $baseRow + $r;
			$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

			$objPHPExcel->getActiveSheet()
			->setCellValue('A'.$row, $dataRow['kode'])
			->setCellValue('B'.$row, $dataRow['lab'])
			->setCellValue('C'.$row, $dataRow['nama_bahan'])
			->setCellValue('D'.$row, $dataRow['satuan']);
		}
		$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

		$temp_name=tempnam(sys_get_temp_dir(),'PHPExcel');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save($temp_name);

		$filename='excel_template.docx';
		header('Content-Type: application/vnd.ms-excel');
		header('Cache-Control: max-age=0'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		readfile($temp_name);
		unlink($temp_name);
	}
}
