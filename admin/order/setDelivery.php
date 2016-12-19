<?php
$id = $_GET['id'];
$query = mysql_query("select * from checkout where Id=$id");
$truckQuery = mysql_query("select * from truck");
$row = mysql_fetch_array($query);
$orderNumber = $row['orderNumber'];
$cartQuery = mysql_query("select * from cart where orderNumber='$orderNumber'");
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>

<?=$message;?></br></br>
<div class="wrapper">
<div style="font-weight:bold; font-size:20px; border-bottom:2px solid grey;">FOR DELIVERY ORDER</br></div></br>
<?php
if(mysql_num_rows($cartQuery)>0){
	while($cartRow=mysql_fetch_array($cartQuery)){
?>
<!-- Put space check layout in document page 50 -->
<table class="tablelist">
	<td>Name: <?=getProductName($cartRow['productId']);?></td>
	<td>Product ID:<?=$cartRow['productId'];?></td>
	<td>Quantity:<?=$cartRow['quantity'];?></td>
	<td>Price: <?=getProductPrice($cartRow['productId']);?></td>
	<td>Total:<?=$cartRow['price'];?></td>
</table>
</br></br>
<?php
	}
}
else{
	echo "Cart is Empty.";
}
?>
</br>
<div style="font-weight:bold; font-size:30px; border-bottom:2px solid grey;">Shipping Information</br></div></br>
<div style="color:green; font-weight:bold; font-size:20px;">Order Number: #<?=$row['orderNumber'];?></br></div>
Date:<?=$row['date'];?></br></br>
<div style="font-weight:bold; font-size:20px;">Username:<?=$row['username'];?></br></br></div>

Address:
<?=$row['street'];?>, <?=$row['brgy'];?></br>
<?=$row['city'];?></br>
<?=$row['province'];?></br>
<?=$row['postal'];?></br>
</br>

Total Price:<?=$row['totalPrice'];?></br></br>
<div style="font-weight:bold; font-size:20px;">Status: <?=$row['status'];?></br></br></div>

<form action="process.php?action=setDelivery&id=<?=$id?>" method="POST">
<input type="hidden" name="orderNumber" value="<?=$row['orderNumber'];?>">
<input type="date" name="deliveryDate">
</br></br></br><label>CHOOSE TRUCK *</label></br></br>
<select name="truck" class="select"required>
	</br><option value="">-- Select Truck --</option>
	<?php
	if(mysql_num_rows($truckQuery)>0){ 
			while($truckRow=mysql_fetch_array($truckQuery)){
	?>
	<option value="<?=$truckRow['Id']?>"><?=$truckRow['name']?></option>
	<?php
			}
	}
	?>
</select>
</br></br><input type="submit" class="myButton" value="Set Delivery">
</form>
</br>
</div>