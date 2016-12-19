<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from truck");

$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>
<div class="listwrapper">
	<button class="myButton" onClick="location.href='?view=add'">Add Truck</button>
	<div class="successmessage"><?=$message;?></div>
	</br>
	
	<table class="tablelist">
	<tr>
		<th>TRUCK NAME</th>
		<th></th>
		<th></th>
	</tr> 
	<?php
		while($row=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?=$row['name']?></td>
		<td><button class="button updatebtn" onClick="location.href='?view=update&id=<?=$row['Id']?>'">Update</button></td>
		<td><button class="button deletebtn" onClick="location.href='process.php?action=delete&id=<?=$row['Id']?>'">Delete</button></td>
	</tr>

	<?php
		}
	?>
	</table>
	<div class="clear"></div>
</div>