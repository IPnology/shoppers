<?php
$query = mysql_query("select * from temp_cart where username='$username'");

#count to be sent to process for array
$count=mysql_num_rows($query);

$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>

<div class="checkoutwrap">
	<div class="successmessage"><?=$message;?></div>
	<div>
		<div>
		<div class="mycartheader">YOUR ORDER</div>
			<table class="tablemycart">
				<tr>
					<th>PRODUCT NAME</th>
					<th></th>
					<th>QTY.</th>
					<th></th>
					<th>PRICE</th>
				</tr>
				
			<form action="process.php?action=update-quantity" method="POST">
			<input type="hidden" name="count" value="<?=$count;?>">
			<?php
			$totalPrice = 0;
			if(mysql_num_rows($query)>0){ 
				while($row=mysql_fetch_array($query)){
					$totalPrice += $row['price'];
							
			?>	
				<input type="hidden" name="id[]" value="<?=$row['Id'];?>">
				<input type="hidden" name="price[]" value="<?=$row['price'];?>">
				<tr>
					<td><?=getProductName($row['productId'])?></td>
					<td>X</td>
					<td><input type="text" name="quantity[]" value="<?=$row['quantity']?>" required></td>
					<td>=</td>
					<td><?=$row['price']?>.00</td>
				</tr>
			
			<?php
				}	
				?>
				
				<tr class="checkouttotal">
					<td class="checkoutfont">TOTAL</td>
					<td></td>
					<td></td>
					<td></td>
					<td class="checkoutfont">PHP <?=$totalPrice;?>.00</td>
				</tr>
				<?php
				}
				else
				{
					echo "<tr>
							<td colspan='5'>Cart is empty
							</tr>";
				}
			?>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" class="updatebtn" name="Submit" value="Update Cart"></td>				
			</form>
			</table>		
		</div>
	</div>
	</br>
	<div style="margin-left:auto; margin-right: auto; width: 390px;"> 
	<button class="myButton" style="height: 36px;" onClick="location.href='index.php'">Continue Shopping</button>
	<button class="deletebtn" onClick="location.href='?view=shipping-address&tp=<?=$totalPrice;?>'">Proceed to Checkout >></button>
	</br></br>
	</div>

</div>
