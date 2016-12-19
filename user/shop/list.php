<?php
$query = mysql_query("select * from shop");

$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
?>

<div class="main_bg">
<div class="wrap">	
<div class="main">
<div style="width: 74.3333%; margin-left:auto; margin-right:auto;">
<button class ="myButton" onClick="location.href='?view=add'">Add Shop</button>
<div class="successmessage"><?=$message;?></div>
<?php
	while($row=mysql_fetch_array($query)){
?>
<!--diri-->
<!-- start grids_of_3 -->
<?php

if(file_exists("../../media/".$row['logo']))
    $fileName = $row['logo'];
else
    $fileName = "default.png";
?>

	<div class="grids_of_3">
		<div class="grid1_of_3">
			<img src="../../media/<?=$fileName?>" alt=""/>
				<div class="descname"><?=$row['name']?></div>
				<div class="price">
					<button class="myButton" onClick="location.href='?view=detail&id=<?=$row['Id']?>'">view</button>
				</div>
			</div>
	</div>
	<!--asta d-->
<?php
	}
?>
<div class="clear"></div>
</div>
</div>
</div>
</div>	