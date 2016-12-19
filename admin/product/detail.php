<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from product where Id = $id");

$row=mysql_fetch_array($query);

if(file_exists("../../media/".$row['image']))
    $fileName = $row['image'];
else
    $fileName = "default.png";

?>	
	
<div style="width: 90%; margin-left: auto; margin-right: auto;">
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
						<p>Category: <?=getCategoryName($row['categoryId'])?></p>
						<p>Description: <?=$row['description']?></p>
						<p>Price:<?=$row['price']?><p></br>
						<div>
								<button class="button updatebtn" style=" width: 160px;"onClick="location.href='?view=update&id=<?=$row['Id']?>'">Update</button></br>
								</br>
								<button class="button deletebtn" style=" width: 160px;"onClick="location.href='process.php?action=delete&id=<?=$row['Id']?>'">Delete</button>
							<div class="clear"></div>
						</div>
					 </div>
				</div>
				<div class="clear"></div>
	       </div>
	   <div class="clear"></div>
	</div>
</div>	