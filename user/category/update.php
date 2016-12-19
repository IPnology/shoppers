<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from category where Id = $id");

$row=mysql_fetch_array($query)
?>

<form action="process.php?action=update&id=<?=$id?>" method="POST" enctype="multipart/form-data">
	<div class="ccontainer">
	Name:</br>
	<input type="text" name="name" value="<?=$row['name']?>" required></br>
	Description:</br>
	<textarea name="description" class="description"><?=$row['description']?></textarea></br></br>
	Upload Photo:
	<input type="file" name="upload_file"/><br>
	</br></br>
	<button class="button updatebtn" type="submit">Save Changes</button>
	
	</div>
</form>