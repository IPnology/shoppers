<?php
$catId = (isset($_GET['catId']) && $_GET['catId'] != '') ? $_GET['catId'] : '';

if ($catId!="")
{
	$getCatId = "where categoryId=$catId";
}
else
{
	$getCatId ="";
}
	

$query = mysql_query("select * from product $getCatId");

$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>


<div class="main_bg">
<div class="wrap">	
<div class="main">
<div style="width: 74.3333%; float:left; margin-top: -2.3%;">
<?php
	while($row=mysql_fetch_array($query)){
?>
<!--diri-->
<!-- start grids_of_3 -->
<?php

if(file_exists("../../media/".$row['image']))
    $fileName = $row['image'];
else
    $fileName = "default.png";
?>
	<div class="grids_of_3">
		<div class="grid1_of_3">
			<img src="../../media/<?=$fileName;?>" alt=""/>
				<div class="descname"><?=$row['name']?></div>
				<div class="price">
					<button class="myButton" onClick="location.href='?view=detail&id=<?=$row['Id']?>'">VIEW PRODUCT</button>
				</div>
			</div>
	</div>
	
	<!--asta d-->
<?php
	}
?>

</div>
</div>
</div>
</div>

<?php
if (!isset($username)){}
else{
require_once 'tempCart.php';
}
?>

<div class="clear"></div>