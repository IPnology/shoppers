<?php
$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
$search = strtolower($search);

$query = mysql_query("select * from product where name like '%$search%'");
?>

<style>
	table {
		border-collapse: collapse;
		width: 100%;
		font-family: Arial;
		font-size: 80%;
	}

	th, td {
		padding: 8px;
		text-align: center;
		border-bottom: 1px solid #ddd;
		text-decoration: none;
	}
	
	th {
		background-color: #b7b7b7;
		color: white;
	}

	tr:hover{background-color:#f5f5f5}
	
	button {
		border: none;
		border-radius: 5px;
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 90%;
		margin: 2px 2px;
		cursor: pointer;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
	}
	
	.deletebtn:hover {
		background-color: #ac1414;
	}
	
	.deletebtn {
		color: white;
		background-color: #e52828;
	}
	
	.updatebtn {
		color: white;
		background-color: #2391d6;
	}
	
	.updatebtn:hover {
		background-color: #186799;
	}
</style>

<button onClick="location.href='?view=add'">Add Product</button></br></br>

<table>
	
	<tr>
		<th>CategoryId</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Image</th>
		<th></th>
		<th></th>
	</tr>
		
	<?php
		while($row=mysql_fetch_array($query)){
	?>	
		
	<tr>
		<td><?=$row['categoryId']?></td>
		<td><a href="?view=detail&id=<?=$row['Id']?>"><?=$row['name']?></td>
		<td><?=$row['description']?></td>
		<td><?=$row['price']?></td>
		<td><?=$row['image']?></td>
		<td><button class="button deletebtn" onClick="location.href='process.php?action=delete&id=<?=$row['Id']?>'">Delete</button></td>
		<td><button class="button updatebtn" onClick="location.href='?view=update&id=<?=$row['Id']?>'">Update</button></td>
	</tr>
	<?php
		}
	?>
</table>
