<?php
if (!isset($username)){
	echo "Please login.";
}
else{

$query = mysql_query("select * from checkout where username = '$username'");
?>
<div class="listwrapper">
<div class="myaccountheader" style=" font-size: 1.6em;"></br>ORDER DETAILS</br></h1></div>
<table class="tablelist">

	<tr>
		<th>USERNAME</th>
		<th>ORDER NUMBER</th>
		<th>DATE</th>
		<th>STATUS</th>
		<th>TOTAL PRICE</th>
		<th></th>
	</tr>
	
	<?php
		while($row=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?=$row['username']?></td>
		<td><?=$row['orderNumber']?></td>
		<td><?=$row['date']?></td>
		<td><?=$row['status']?></td>
		<td><?=$row['totalPrice']?></td>
		<td><button class="myButton" onClick="location.href='?view=detail&id=<?=$row['Id']?>'">VIEW ORDER</button></td>
	</tr>
	<?php
		}
	?>
	
</table>
</div>
<?php
}
?>