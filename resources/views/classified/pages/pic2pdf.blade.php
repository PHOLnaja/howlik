<?php

	//require_once('html2_pdf_lib/html2pdf.class.php');
	echo "<pre>";print_r($id);die;
	if(isset($id) && trim($id)!=''){
		
		$ids = explode('*',$id);
		echo "<pre>";print_r($ids);die;
		foreach ($ids as $key => $id) {
		
			$html_content	= file_get_contents('http://www.howlik.com/en/certificate/'.$id);
			
			$html2pdf		= new HTML2PDF('P', 'A4');
			$html2pdf->writeHTML($html_content);
			$file			= $html2pdf->Output('public/pdf/'.$id.'.pdf','F');

			$html_content	= file_get_contents('http://www.howlik.com/en/'.$id.'/sent/mail');
		}
	}
	
?>
