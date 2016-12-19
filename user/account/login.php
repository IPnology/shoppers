<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
?>
<div class="loginwrapper">
<form action="process.php?action=login" method="POST">
<div class="cmLogo"></div>
  <div class="container">
  
<div style="color: #e41b1b; font-size: .86em; text-transform: uppercase; margin-left: auto; margin-right: auto; width: 50.333%;"><?=$error;?></div>
    <div class="labels">Username:</div>
    <input type="text" placeholder="Enter Username" name="username" required>
	</br>
    <div class="labels">Password:</div>
    <input type="password" placeholder="Enter Password" name="password" required>
    </br></br>
	<div class="logincenter"><button class="loginbtn" type="submit">Login</button></div>
</form>
</div>