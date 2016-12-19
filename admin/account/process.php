<?php

require_once '../../config/database.php';

$action = $_GET['action'];	
	
switch ($action) {
    
	case 'login' :
		login();
		break;

	case 'register' :
		register();
		break;
	
	case 'delete' :
		delete();
		break;
	
	case 'update' :
		update();
		break;
		
	case 'logout' :
		logout();
		break;
	
	default :
}


function login()
{
	// if we found an error save the error message in this variable
	
	$userName = $_POST['username'];
	$password = $_POST['password'];
	
	$query = mysql_query("select * from admin where username = '".$userName."' and password = '".$password."'");
	
	if (mysql_num_rows($query) != 0)
	{

		$_SESSION['admin_session'] = $userName;
		header('Location: ../home/');

			
	}
	else
	{
		header('Location: index.php?error=User not found in the Database');
	}
	
}


function logout()

{
	if (isset($_SESSION['admin_session'])) {
		unset($_SESSION['admin_session']);
	}
	header('Location: index.php');
	exit;
}


function register()
{
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	
	mysql_query("insert into admin set username='".$username."',
													fname='".$firstname."',
													lname='".$lastname."',
													password='".$password."',
													level='".$level."'");
							
	header('Location: ../account/?view=list');
	
}

function delete()
{
	$id = $_GET['id'];	
	
	mysql_query("delete from admin where Id = '".$id."'");
	
	header('Location: ../account/?view=list&message=Successfully Deleted.');
	
}

function update()
{
	$id = $_GET['id'];	
	
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	
	mysql_query("update admin set username='".$username."',
												fname='".$firstname."',
												lname='".$lastname."',
												password='".$password."',
												level='".$level."'
												where Id = '".$id."'");
												
	header('Location: ../account/?view=list&message=Successfully Updated.');
	
}

?>