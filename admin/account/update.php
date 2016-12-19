<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from admin where Id = $id");

$row=mysql_fetch_array($query)
?>

<form action="process.php?action=update&id=<?=$id?>" method="POST">
	<div class="wrapper">
	<div class="fnhalf">
	<label>FIRST NAME *</label>
	<input type="text" name="firstname" value="<?=$row['fname']?>" placeholder="your first name" required>
	</div>
	
	<div class="lnhalf">
	<label>LAST NAME *</label>
	<input type="text" name="lastname" value="<?=$row['lname']?>" placeholder="your last name" required>
	</div></br></br></br>
	
	<div class="fnhalf">
	<label>USERNAME *</label>
	<input type="text" name="username"  value="<?=$row['username']?>" placeholder="your username" required>
	</div>
	
	<div class="lnhalf">
	<label>PASSWORD *</label>
	<input type="password" name="password" placeholder="enter password" required>
	</div></br></br>
	
	<select name="level" class="select" required>
			<option value="<?=$row['level']?>"><?=$row['level']?></option>
			<option value="admin">Admin</option>
			<option value="staff">Staff</option>
			<option value="delivery">Delivery</option>
	</select>
	</br></br>
	
	<button type="submit" class="myButton" value="Update">Save Changes</button>
</form>
</div>
