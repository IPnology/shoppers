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
	$categoryId = $_POST['category'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	
	// Where the file is going to be placed 
	$target_path = "../../media/";

	/* Add the original filename to our target path.  
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $_FILES['upload_file']['name']); 

	$temp = explode(".", $_FILES["upload_file"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	mysql_query("insert into product set categoryId='$categoryId',
											name='$name',
											description='$description',
											price='$price',
											image='$newfilename'");
							
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../product/');
	}
	else{
		
	header('Location: ../product/?error=Not uploaded');
	}
	
}

function delete()
{
	$id = $_GET['id'];	
	
	mysql_query("delete from product where Id = '$id'");
	
	header('Location: ../product/?view=list&message=Successfully Deleted.');
	
}

function update()
{
	$id = $_GET['id'];	
	
	$categoryId = $_POST['category'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	
	// Where the file is going to be placed 
	$target_path = "../../media/";

	/* Add the original filename to our target path.  
	Result is "uploads/filename.extension" */
	$target_path = $target_path . basename( $_FILES['upload_file']['name']); 

	$temp = explode(".", $_FILES["upload_file"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	mysql_query("update product set categoryId='$categoryId',
										name='$name',
										description='$description',
										price='$price',
										image='$newfilename'
										where Id = '$id'");
	
	if(move_uploaded_file($_FILES['upload_file']['tmp_name'], "../../media/" . $newfilename)) {
							
	header('Location: ../product/?view=list&message=Successfully Updated.');
	}
	else{
		
	header('Location: ../product/?error=Not uploaded');
	}
	
}

?>