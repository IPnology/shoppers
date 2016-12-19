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
	$owner = $_POST['owner'];
	$description = $_POST['description'];
	
	// Where the file is going to be placed 
	$target_path = "../../media/";

	/* Add the original filename to our target path.  
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $_FILES['upload_file']['name']); 

	$temp = explode(".", $_FILES["upload_file"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	mysql_query("insert into shop set name='".$name."',
											owner = '".$owner."',
											description='".$description."',
											logo='".$newfilename."'");
	
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../shop/?view=list&message=Successfully Added a Shop');
	}
	else{
		
	header('Location: ../shop/?error=Not uploaded');
	}
	
}

function delete()
{
	$id = $_GET['id'];	
	
	mysql_query("delete from shop where Id = '".$id."'");
	
	header('Location: ../shop/?view=list&message=Successfully Deleted.');
	
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
	
	mysql_query("update shop set name='".$name."',
										description='".$description."',
										logo='".$newfilename."'
										where Id = '".$id."'");
												
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../shop/?view=list&message=Successfully Updated.');
	}
	else{
		
	header('Location: ../shop/?error=Not uploaded');
	}
	
}

?>