<!DOCTYPE html>
<html>
<body>

<form action="process.php?action=add" method="POST" enctype="multipart/form-data">
	<div class="ccontainer">
	Name:</br>
	<input type="text" name="name" placeholder="Add category"></br>
	Description:</br>
	<textarea name="description" placeholder="Input description here" class="description"></textarea></br></br>
	Upload Photo:
	<input type="file" name="upload_file"/><br>
	</br></br>
	<input type="submit" class="btn-addcategory" value="Add">
	</div>
</form>
	
</body>
</html>