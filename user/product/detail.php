<?php
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : ''; 
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
$query = mysql_query("select * from product where Id = $id");
$row=mysql_fetch_array($query);
if(file_exists("../../media/".$row['image']))
    $fileName = $row['image'];
else
    $fileName = "default.png";
?>	

<div style="width: 90%; margin-left: auto; margin-right: auto;">
		<div class="successmessage"><?=$message;?></div>
		<div class="single">
			<div class="left_content">
					<div class="span1_of_1">
						<div class="product-view">
							<div class="product-essential">
								<div class="product-img-box">
									<div class="product-image"> 
										<img src="../../media/<?=$fileName;?>"></br>
								   </div>
								</div>
							</div>
						</div>
					</div>

					<div style="margin-right: 15%;">
						<div class="desc1">
							<h3>Name: <?=$row['name']?></br></h3>
							<p>Description: <?=$row['description']?></p>
							<p>Price: <?=$row['price']?><p>
							</br>
							<?php
							# This is for users that are not logged in!!! DO NOT DELETE!
							if (!isset($username)){ #start if 
							?>
							
							<button type="button" class="updatebtn" onClick="location.href='?view=detail&id=<?=$row['Id']?>&message=Please Login.'">Add to Wishlist</button>
							<button type="button" class="updatebtn" onClick="location.href='?view=detail&id=<?=$row['Id']?>&message=Please Login.'">Add to Cart</button>
							
							<?php
							}
							else {
							?>
							<!--This is for the users that are logged in!!! DO NOT DELETE! -->
							
							<form action="../wishlist/process.php?action=add-to-wishlist" method="POST" >
										<input type="hidden" name="username" value="<?=$username?>">
										<input type="hidden" name="productId" value="<?=$id?>">
										
										<?php
										$countData = mysql_num_rows(mysql_query("select * from wishlist where productId = $id and username = '$username'"));
										?>
										<?php
											if ($countData > 0){					
										?>
											<button type="button" class="button deletebtn" onClick="location.href='../wishlist/process.php?action=delete&id=<?=$row['Id']?>'">Remove from Wishlist</button>
										<?php
											}
											else{
												echo "<button class='wishbtn' type='submit'>Add to Wishlist</button>";
											}
										?>
										
							</form>
							<div class="available">
									<form action="process.php?action=add-to-cart" method="POST" >
										<input type="hidden" name="username" value="<?=$username?>">
										<input type="hidden" name="productId" value="<?=$id?>">
										<input type="hidden" name="quantity" value="1">
										<input type="hidden" name="price" value="<?=$row['price']?>">
										
										<?php
										$countData = mysql_num_rows(mysql_query("select * from temp_cart where productId = $id and username = '$username'"));
										?>
										<?php
											if ($countData > 0){
												echo "<button class='deletebtn' type='button'>Already Added to Cart</button>";
											}
											else{
												echo "<button class='updatebtn' style='width: 182px;' type='submit'>Add to Cart</button>";
											}
										?>
										</form>
									
							<?php
							}#end if
							?>
							
								<div class="clear"></div>
							</div>
						 </div>
					</div>
					<div class="clear"></div>
			</div>
			   <?php
				if (!isset($username)){}
				else{
					require_once 'tempCart.php';
				}
				?>
		   <div class="clear"></div>
		</div>

</div>