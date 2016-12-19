<?php

require_once '../../config/database.php';

$action = $_GET['action'];	
	
switch ($action) {
    
	case 'login' :
		login();
		break;

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


function login()
{
	// if we found an error save the error message in this variable
	
	$userName = $_POST['username'];
	$password = $_POST['password'];
	
	$query = mysql_query("select * from user where username = '".$userName."' and password = '".$password."'");
	
	if (mysql_num_rows($query) != 0)
	{

		$_SESSION['user_session'] = $userName;
		header('Location: ../home/');

			
	}
	else
	{
		header('Location: index.php?error=User not found in the Database');
	}
	
}

function add()
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	// Where the file is going to be placed 
	$target_path = "../../media/";

	/* Add the original filename to our target path.  
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $_FILES['upload_file']['name']); 

	$temp = explode(".", $_FILES["upload_file"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	mysql_query("insert into category set name='".$name."',
											description='".$description."',
											image='".$newfilename."'");
	
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../category/');
	}
	else{
		
	header('Location: ../category/?error=Not uploaded');
	}
	
}

function delete()
{
	$id = $_GET['id'];	
	
	mysql_query("delete from category where Id = '".$id."'");
	
	header('Location: ../category/?view=list&message=Successfully Deleted.');
	
}

function update()
{
	$id = $_GET['id'];	
	
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	// Where the file is going to be placed 
	$target_path = "../../media/";

	/* Add the original filename to our target path.  
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $_FILES['upload_file']['name']); 

	$temp = explode(".", $_FILES["upload_file"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	mysql_query("update category set name='".$name."',
										description='".$description."',
										image='".$newfilename."'
										where Id = '".$id."'");
												
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../category/?view=list&message=Successfully Updated.');
	}
	else{
		
	header('Location: ../category/?error=Not uploaded');
	}
	
}

?>