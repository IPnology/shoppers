<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from category where Id = $id");

$row=mysql_fetch_array($query)
?>

<form action="process.php?action=update&id=<?=$id?>" method="POST" enctype="multipart/form-data">
	<div class="wrapper">
	<div class="fnwhole">
	<label>NAME *</label>
	<input type="text" name="name" value="<?=$row['name']?>" required>
	</div>
	
	<label>DESCRIPTION *</label>
	<textarea name="description" class="wholedescription"><?=$row['description']?></textarea>
	</br>
	</br>
	
	<label>UPLOAD PHOTO *</label>
	</br>
	<input type="file" name="upload_file"/></br></br>
	<button class="myButton" type="submit">Save Changes</button>
	
</form>
</div>