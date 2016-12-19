<?php
include_once("../../config/database.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
		
	default :
		$content 	= 'content.php';
		$template = '../../include/template-main.php';
		$header 	= '../../include/headerCustomer.php';
		$footer 	= '../../include/footer.php';
}

require_once $template;


?>