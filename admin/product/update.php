<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from product where Id = $id");

$row=mysql_fetch_array($query);


$catQuery = mysql_query("select * from category");
?>

<form action="process.php?action=update&id=<?=$id?>" method="POST" enctype="multipart/form-data">
	<div class="wrapper">
	<div class="lnwhole">
	<label>CHOOSE CATEGORY *</label></br></br>
	<select name="category" class="select" required>
		<option value="<?=$row['categoryId']?>"><?=getCategoryName($row['categoryId'])?></option>
		<?php
		if(mysql_num_rows($catQuery)>0){ 
				while($catRow=mysql_fetch_array($catQuery)){
		?>
		<option value="<?=$catRow['Id']?>"><?=$catRow['name']?></option>
		<?php
				}
		}
		?>
	
	</select>
	</div></br></br>
	
	<div class="fnwhole">
	<label>NAME *</label>
	<input type="text" name="name" value="<?=$row['name']?>" placeholder="Add category">
	</div>
	
	<label>DESCRIPTION *</label>
	<textarea name="description" class="wholedescription" ><?=$row['description']?></textarea></br></br>
	
	<div class="fnwhole">
	<label>PRICE *</label>
	<input type="text" name="price" value="<?=$row['price']?>" placeholder="add price">
	</div></br></br>
	
	<label>UPLOAD PHOTO *</label>
	<input type="file" name="upload_file"/><br></br>
	
	<button type="submit" class="myButton"  value="Update">Save Changes</button>

	
</form>

</div>