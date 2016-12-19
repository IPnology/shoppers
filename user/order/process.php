<?php

require_once '../../config/database.php';

$action = $_GET['action'];

switch ($action) {
	
	case 'update' :
	update();
	break;
	
	case 'cancel' :
	cancel();
	break;
	
	default:
}

function update()
{
	$id = $_GET['id'];	
	
	$status = $_POST['status'];
	
	mysql_query("update checkout set status='".$status."' where Id = '".$id."'");
												
	header('Location: ../order/?view=detail&id='.$id.'&message=Successfully Updated.');
	
}

function cancel()
{
	$id = $_GET['id'];
	
	mysql_query("update checkout set status='Canceled' where Id = '".$id."'");
	
	header('Location: ../order/?view=detail&id='.$id.'&message=Successfully Canceled Order.');
}
?>