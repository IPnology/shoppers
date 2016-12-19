<?php
$query = mysql_query("select * from admin");

$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>
<div class="listwrapper">

	<button class="myButton" onClick="location.href='?view=register'">ADD ACCOUNT</button></br>
	<br>
	<div class="successmessage"> <?=$message;?></div>

	<table class="tablelist">
		
		<tr>
			<th>USERNAME</th>
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
			<th>LEVEL</th>
			<th></th>
			<th></th>
		</tr>
			
		<?php
			while($row=mysql_fetch_array($query)){
		?>	
			
		<tr>
			<td><?=$row['username']?></td>
			<td><?=$row['fname']?></td>
			<td><?=$row['lname']?></td>
			<td><?=$row['level']?></td>
			<td><button class="updatebtn" onClick="location.href='?view=update&id=<?=$row['Id']?>'">UPDATE</button></td>
			<td><button class="deletebtn" onClick="location.href='process.php?action=delete&id=<?=$row['Id']?>'">DELETE</button></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>