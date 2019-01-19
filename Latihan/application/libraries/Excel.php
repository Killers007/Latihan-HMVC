<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php"; 

class Excel extends PHPExcel { 
	public $spreadsheet;
	public function __construct() { 
		parent::__construct();
	} 

	public function render($datas){

		$this->spreadsheet=new PHPExcel();
	//initialize
		$this->spreadsheet->getProperties()->setCreator('PHPExcel - Killers web')
		->setLastModifiedBy('PHPExcell - Killers web')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$i=1; 
		$col='A';

	//insert header
		foreach ($datas->field_data() as $key => $value) {
			if ($key!=0) {
				$col++;
			}
			$this->spreadsheet->setActiveSheetIndex(0)
			->setCellValue($col.$i, str_replace('_', ' ', strtoupper($value->name)));
		}

	//insert cells
		foreach($datas->result() as $data) {
			$i++;
			$alfa='A';
			foreach ($data as  $value) {
				$this->spreadsheet->setActiveSheetIndex(0)
				->setCellValue(($alfa++).$i, $value);
			}
		}

	//autosize
		for($cols = 'A'; $cols !== $col; $cols++) {
			$this->spreadsheet->getActiveSheet()
			->getColumnDimension($cols)
			->setAutoSize(true);
		}

		/** Borders for heading */
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		$this->spreadsheet->getActiveSheet()->getStyle(
			'A1:' . 
			$this->spreadsheet->getActiveSheet()->getHighestColumn() . 
			$this->spreadsheet->getActiveSheet()->getHighestRow()
		)->applyFromArray($styleArray);

		$this->spreadsheet->getActiveSheet()
		->getStyle("A1:{$col}1")
		->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()
		->setRGB('f39c12');


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate'); 
		header('Pragma: public'); 

		$writer = PHPExcel_IOFactory::createWriter($this->spreadsheet, 'Excel5');
		$writer->save('php://output');
	}
}
?>