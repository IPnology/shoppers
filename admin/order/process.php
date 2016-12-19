<?php

require_once '../../config/database.php';

$action = $_GET['action'];

switch ($action) {
	
	case 'approve' :
	approve();
	break;
	
	case 'reject' :
	reject();
	break;
	
	case 'setDelivery' :
	setDelivery();
	break;
	
	default:
}

function approve()
{
	$id = $_GET['id'];	
	
	mysql_query("update checkout set status='Approved' where Id = '".$id."'");
												
	header('Location: ../order/?view=detail&id='.$id.'&message=Successfully Approved.');
}

function reject()
{
	$id = $_GET['id'];	
	
	mysql_query("update checkout set status='Rejected' where Id = '".$id."'");
												
	header('Location: ../order/?view=detail&id='.$id.'&message=Successfully Rejected.');
}

function setDelivery()
{
	$id = $_GET['id'];
	$orderNumber = $_POST['orderNumber'];
	$deliveryDate = $_POST['deliveryDate'];
	$truck = $_POST['truck'];
	
	mysql_query("insert into delivery set orderNumber='$orderNumber',
											deliveryDate='$deliveryDate',
											truckId='$truck'");
											
	mysql_query("update checkout set status='Delivery' where Id = '$id'");
											
	header ('Location: ../order/?status=Approved');
}
?>