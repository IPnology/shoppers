<?
$query = mysql_query("select * from user where Id = $id");
$row=mysql_fetch_array($query);
?>

<form action="process.php?action=add" method="POST" enctype="multipart/form-data">
	<div class="wrapper">
	<div class="fnwhole">
	<label>NAME *</label>
	<input type="text" name="name" placeholder="Add shop">
	</div>
	
	<input type="hidden" name="owner" value="<?=$username?>">
	
	<label>DESCRIPTION *</label>
	</br>
	<textarea name="description" placeholder="Input description here" class="wholedescription"></textarea></br>
	</br>
	
	<label>UPLOAD LOGO *</label>
	</br>
	<input type="file" name="upload_file"/></br></br>
	<input type="submit" class="myButton" value="Add">
	

</form>
</div>