<?php

require_once '../../config/database.php';

$action = $_GET['action'];	
	
switch ($action) {
    
	case 'add' :
		add();
		break;
	
	case 'delete' :
		delete();
		break;
	
	case 'update' :
		update();
		break;
	
	default :
}

function add()
{
	$name = $_POST['name'];
	
	mysql_query("insert into truck set name='$name'");
	
	header('Location: ../truck/');
}

function delete()
{
	$id = $_GET['id'];	
	
	mysql_query("delete from truck where Id = '$id'");
	
	header('Location: ../truck/?view=list&message=Successfully Deleted.');
}

function update()
{
	$id = $_GET['id'];	
	
	$name = $_POST['name'];
	
	mysql_query("update truck set name='$name' where Id = '$id'");
							
	header('Location: ../truck/?view=list&message=Successfully Updated.');
}

?>