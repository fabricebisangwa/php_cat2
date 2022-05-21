<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
			
			<a style="margin-left:1200px; " href="admin_login.php" class="navbar-brand" >Login</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h4 class="text-primary">WELCOME TO THE IPRC TUMBA STUDENT REGULATIONS PORTAL</h4>
		<hr style="border-top:1px dotted #ccc;" />
		</div>
		<table class="table table-bordered">
			<thead class="alert-danger">
				<tr>
					<th>Article</th>
					<th>Content</th>
				</tr>
			</thead>
			<tbody class="alert-warning">
				<?php
					require 'connection.php';
					$sql = $db->prepare("SELECT * FROM `reg` ORDER BY `reg_id` ASC");
					$sql->execute();
					while($row = $sql->fetch()){
				?>
				<tr>
					<td><?php echo $row['article']?></td>
					<td><?php echo $row['content']?></td>
					
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>