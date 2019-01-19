<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phpexcels extends MX_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('template'));
		$this->load->library('excel');
	}

	public function index(){
		$datas = $this->db->get('silab_m_fakultas')->result();
		$spreadsheet= $this->excel;

		$spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
		->setLastModifiedBy('Andoyo - Java Web Medi')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		$i=1; 
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, 'KODE Fakultas')
		->setCellValue('B'.$i, 'NAMA Fakultas')
		->setCellValue('C'.$i, 'Prodi Fakultas')
		;
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(80);
		$spreadsheet->getActiveSheet()->getStyle("A$i:C$i")->applyFromArray(
			[
				'font' => [
					'bold' => true,
				],
				'alignment' => [
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'outline' => [
						'style' => PHPExcel_Style_Border::BORDER_THIN,
					],
				],
				'fill' => [
					'fillType' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'rotation' => 90,
					'startColor' => [
						'argb' => 'FFA0A0A0',
					],
					'endColor' => [
						'argb' => 'FFFFFFFF',
					],
				],
			]
		);

		$spreadsheet->getActiveSheet()->getStyle('A'.$i)->applyFromArray(
			[
				'alignment' => [
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'outline' => [
						'style' => PHPExcel_Style_Border::BORDER_THIN,
					],
				],
			]
		);

		$spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray(
			[
				'alignment' => [
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'outline' => [
						'style' => PHPExcel_Style_Border::BORDER_THIN,
					],
				],
			]
		);


		foreach($datas as $data) {
			$i++;
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $data->kode_fakultas)
			->setCellValue('B'.$i, $data->fakultas)
			->setCellValue('C'.$i, 'tess');
			$spreadsheet->getActiveSheet()->getStyle("A$i:C$i")->applyFromArray(
				[
					'alignment' => [
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
					],
					'borders' => [
						'outline' => [
							'style' => PHPExcel_Style_Border::BORDER_THIN,
						],
					]
				]
			);
			// $spreadsheet->getActiveSheetIndex(0)->getColumnDimension(chr($i))->setAutoSize(true);
		}


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate'); 
		header('Pragma: public'); 

		$writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel5');
		$writer->save('php://output');
		// exit;
	}

	public function template(){
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("E:\template.xls");

		// echo date('H:i:s') , " Add new data to the template" , EOL;
		$data = array(array('title'		=> 'Excel for dummies',
			'price'		=> 17.99,
			'quantity'	=> 2
		),
		array('title'		=> 'PHP for dummies',
			'price'		=> 15.99,
			'quantity'	=> 1
		),
		array('title'		=> 'Inside OOP',
			'price'		=> 12.95,
			'quantity'	=> 1
		)
	);

		$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

		$baseRow = 5;
		foreach($data as $r => $dataRow) {
			$row = $baseRow + $r;
			$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r+1)
			->setCellValue('B'.$row, $dataRow['title'])
			->setCellValue('C'.$row, $dataRow['price'])
			->setCellValue('D'.$row, $dataRow['quantity'])
			->setCellValue('E'.$row, '=C'.$row.'*D'.$row);
		}
		$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
	}
