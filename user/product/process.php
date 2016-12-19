<?php

require_once '../../config/database.php';

$action = $_GET['action'];	
	
switch ($action) {
    
	case 'add-to-cart' :
		addToCart();
		break;
	
	case 'confirm-address' :
		confirmAddress();
		break;
	
	case 'update-quantity' :
		updateQuantity();
		break;
	
	default :
}

function addToCart()
{
	$username = $_POST['username'];
	$productId = $_POST['productId'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	
	mysql_query("insert into temp_cart set username='".$username."',
											productId='".$productId."',
											quantity='".$quantity."',
											price='".$price."'");
											
	header('Location: ../product/?view=detail&id='.$productId);
}

function updateQuantity()
{
	$count = $_POST['count'];
	
	for($i=0;$i<$count;$i++){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$totalPrice = $quantity[$i] * $price[$i];
		mysql_query("UPDATE temp_cart SET quantity='$quantity[$i]',
											price='$totalPrice'
											WHERE id='$id[$i]'");
		}
	header('Location: ../product/?view=checkout&message=You have successfully Updated Quantity');
}

function confirmAddress()
{
	$username = $_SESSION['user_session'];
	$street = $_POST['street'];
	$brgy = $_POST['brgy'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$postal = $_POST['postal'];
	$tp = $_POST['tp'];
	$orderNumber = round(microtime(true));
	
	# input data to checkout
	mysql_query("insert into checkout set username='".$username."',
											street='".$street."',
											brgy='".$brgy."',
											city='".$city."',
											province='".$province."',
											postal='".$postal."',
											orderNumber='".$orderNumber."',
											totalPrice='".$tp."',
											date=NOW()");

	#copy data from temp_cart to cart
	$query = mysql_query("select * from temp_cart where username='".$username."'");
	if(mysql_num_rows($query)>0){ 
				while($row=mysql_fetch_array($query)){
					
					$productId = $row['productId'];
					$quantity = $row['quantity'];
					$price = $row['price'];					
					
					mysql_query("insert into cart set productId='".$productId."',
														quantity='".$quantity."',
														price='".$price."',
														orderNumber='".$orderNumber."'");
				}
	}
	
	#delete data from temp_cart
	mysql_query("delete from temp_cart where username='".$username."'");
	
	header('Location: ../product/?view=success');
}




?>