<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phpwords extends MX_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('template'));
		$this->load->library('word');
	}

	
	public function index(){
       $PHPWord = $this->word; 
       $section = $PHPWord->createSection(); 

       $section->addText('Hello World!');
       $section->addTextBreak(2);
       $section->addText('Mohammad Rifqi Sucahyo.', array('name'=>'Verdana', 'color'=>'006699'));
       $section->addTextBreak(2);
       $PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
       $PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
       $section->addText('Ini Adalah Demo PHPWord untuk CI', 'rStyle', 'pStyle');

       $filename='just_some_random_name.docx';
       header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
       header('Content-Disposition: attachment;filename="'.$filename.'"'); 
       header('Cache-Control: max-age=0'); 
       $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
       $objWriter->save('php://output');
   }

   public function template(){
      $PHPWord = $this->word; 

      $document = $PHPWord->loadTemplate('Template.docx');

      $document->setValue('Value1', 'Sun');
      $document->setValue('Value2', 'Mercury');
      $document->setValue('Value3', 'Venus');
      $document->setValue('Value4', 'Earth');
      $document->setValue('Value5', 'Mars');
      $document->setValue('Value6', 'Jupiter');
      $document->setValue('Value7', 'Saturn');
      $document->setValue('Value8', 'Uranus');
      $document->setValue('Value9', 'Neptun');
      $document->setValue('Value10', 'Pluto');

      $document->setValue('weekday', date('l'));
      $document->setValue('time', date('H:i'));
      $temp_name=tempnam(sys_get_temp_dir(),'PHPWord');
      $document->save($temp_name);

      $filename='template.docx';
      header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      header('Cache-Control: max-age=0'); 
      header('Content-Disposition: attachment;filename="'.$filename.'"'); 
      readfile($temp_name);
      unlink($temp_name);

  }

}
