<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from truck where Id = $id");

$row=mysql_fetch_array($query)
?>
<div class="wrapper">
<form action="process.php?action=update&id=<?=$id?>" method="POST">
	<label>NAME *</label>
	<input type="text" name="name" value="<?=$row['name']?>" required>
	</br>
	<div style="width:23%;">
	<button class="updatebtn" type="submit">Save Changes</button>
	</div>
</form>
</div>