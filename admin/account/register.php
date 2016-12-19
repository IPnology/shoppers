<form action="process.php?action=register" method="POST">
	<div class="wrapper">
	<div class="fnhalf">
	<label>FIRST NAME *</label></br>
	<input type="text" name="firstname"  placeholder="your first name" required>
	</div>
	
	<div class="lnhalf">
	<label>LAST NAME *</label></br>
	<input type="text" name="lastname"  placeholder="your last name" required>
	</div></br></br></br>
	
	<div class="fnhalf">
	<label>USERNAME *</label></br>
	<input type="text" name="username" placeholder="your username" required>
	</div>
	
	<div class="lnhalf">
	<label>PASSWORD *</label></br>
	<input type="password" name="password" placeholder="enter password" required>
	</div>
	</br>
	</br>
	<select name="level" class="select" required>
			<option value="">Select Level</option>
			<option value="admin">Admin</option>
			<option value="staff">Staff</option>
			<option value="delivery">Delivery</option>
		</select>
	</br></br>
	<button class="registerbtn" type="submit">REGISTER</button>
</form>
</div>
	