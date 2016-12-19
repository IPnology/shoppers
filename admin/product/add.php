<?php
$query = mysql_query("select * from category");
?>

<form action="process.php?action=add" method="POST" enctype="multipart/form-data">
	<div class="wrapper">
	<div class="lnwhole">
	<label>CHOOSE CATEGORY *</label></br></br>
	<select name="category" class="select"required>
		<option value="">-- Select Category --</option>
		<?php
		if(mysql_num_rows($query)>0){ 
				while($row=mysql_fetch_array($query)){
		?>
		<option value="<?=$row['Id']?>"><?=$row['name']?></option>
		<?php
				}
		}
		?>
	
	</select>
	</div>
	</br>
	</br>
	<div class="fnwhole">
	<label>NAME *</label>
	<input type="text" name="name" placeholder="Add product name" required>
	</div>
	
	<label>DESCRIPTION *</label>
	<textarea name="description" placeholder="Input description here" class="wholedescription"></textarea></br>
	</br>
	
	<div class="fnwhole">
	<label>PRICE *</label>
	<input type="text" name="price" placeholder="Add price" required>
	</div>
	</br>
	</br>
	<label>UPLOAD PHOTO *</label>
	</br>
	<input type="file" name="upload_file"/><br></br>

	<input type="submit" class="myButton" value="Add"></br></br>
	
</form>
</div>