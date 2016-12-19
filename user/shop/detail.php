<?php
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$query = mysql_query("select * from shop where Id = $id");

$row=mysql_fetch_array($query);

if(file_exists("../../media/".$row['logo']))
    $fileName = $row['logo'];
else
    $fileName = "default.png";

?>

<div class="main_bg">
<div class="wrap">	
	<div class="main">
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
				<div style="margin-right: 1%;">
					<div class="desc1">
						<h3>Name: <?=$row['name']?></br></h3>
						<p>Description: <?=$row['description']?></p></br>
						<div style="width: 400px;">
								<button class="updatebtn" style=" width: 160px;" onClick="location.href='?view=update&id=<?=$row['Id']?>'">Update</button>
								</br></br>
								<button class="deletebtn" style=" width: 160px;" onClick="location.href='process.php?action=delete&id=<?=$row['Id']?>'">Delete</button>
								</br></br>
							<div class="clear"></div>
						</div>
					 </div>
				</div>
				<div class="clear"></div>
	       </div>
	   <div class="clear"></div>
	</div>
</div>
</div>	
