<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from user where Id = $id");

$row=mysql_fetch_array($query)
?>

<form action="process.php?action=update&id=<?=$id?>" method="POST">
	<div class="wrapper">
	<div class="fwhole">
	USERNAME *</br>
	<input type="text" name="username" value="<?=$row['username']?>" placeholder="your username" required>
	</div></br></br>
	
	<div class="fnhalf">
	FIRST NAME *</br>
	<input type="text" name="firstname" value="<?=$row['fname']?>" placeholder="your first name" required>
	</div>
	
	<div class="lnhalf">
	LAST NAME *</br>
	<input type="text" name="lastname" value="<?=$row['lname']?>" placeholder="your last name" required>
	</div></br></br>
	
	<div class="fnhalf">
	BIRTHDATE *</br>
	<input type="text" name="birthdate" value="<?=$row['birthdate']?>" placeholder="your birthdate" required>
	</div>
	
	<div class="lnhalf">
	GENDER *</br>
	<select name="gender" class="select" required>
			<option value="">Select Gender</option>
			<option value="female">Female</option>
			<option value="male">Male</option>
	</select>
	 
	</div></br></br>
	
	<div class="fnhalf">
	STREET *</br>
	<input type="text" name="street" value="<?=$row['street']?>" placeholder="your Street" required>
	</div>
	
	<div class="lnhalf">
	BARANGAY *</br>
	<input type="text" name="brgy" value="<?=$row['brgy']?>" placeholder="your Barangay" required>
	</div></br></br>
	
	<div class="fnhalf">
	CITY *</br>
	<input type="text" name="city" value="<?=$row['city']?>" placeholder="your City" required>
	</div>
	
	<div class="lnhalf">
	PROVINCE *</br>
	<input type="text" name="province" value="<?=$row['province']?>" placeholder="your Province" required>
	</div></br></br>
	
	<div class="fnhalf">
	POSTAL *</br>
	<input type="text" name="postal" value="<?=$row['postal']?>" placeholder="your Postal" required>
	</div>
	
	<div class="lnhalf">
	PHONE NUMBER *</br>
	<input type="text" name="phoneNumber" value="<?=$row['phoneNumber']?>" placeholder="your phone number" required>
	</div></br></br>
	
	<div class="lnhalf">
	EMAIL *</br>
	<input type="text" name="email" value="<?=$row['email']?>" placeholder="your email" required>
	</div></br></br>
	
	<div class="fnhalf">
	PASSWORD *</br>
	<input type="password" name="password" placeholder="enter password" required>
	</div>
	
	<div class="lnhalf">
	REPEAT PASSWORD *</br>
	<input type="password" name="repeatpassword" placeholder="enter password" required>
	</div></br></br>
	
	<input type="submit" class="registerbtn" value="Update Profile">
	</br></br>
</form>
</div>