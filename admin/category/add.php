<form action="process.php?action=add" method="POST" enctype="multipart/form-data">
	<div class="wrapper">
	<div class="fnwhole">
	<label>NAME *</label>
	<input type="text" name="name" placeholder="Add category">
	</div>
	
	<label>DESCRIPTION *</label>
	</br>
	<textarea name="description" placeholder="Input description here" class="wholedescription"></textarea></br>
	</br>
	
	<label>UPLOAD PHOTO *</label>
	</br>
	<input type="file" name="upload_file"/></br></br>
	<input type="submit" class="myButton" value="Add">
	

</form>
</div>