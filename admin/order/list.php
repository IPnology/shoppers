<?php
$status = (isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : 'Pending';
$query = mysql_query("select * from checkout where status='$status'");
?>
<div class="listwrapper">
<div class="myaccountheader" style=" font-size: 1.6em;"></br>ORDER DETAILS</br></h1></div>
</br>

<table class="tablelist">
	<tr>
		<th class="pendingOrder" onClick="location.href='?status=Pending'">PENDING</th>
		<th class="approvedOrder" onClick="location.href='?status=Approved'">APPROVED</th>
		<th class="rejectedOrder" onClick="location.href='?status=Rejected'">REJECTED</th>
		<th class="delivery" onClick="location.href='?status=Delivery'">DELIVERY</th>
	</tr>
</table>

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