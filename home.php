<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Login and Register Script using PHP PDO with MySQL : onlyxcodes.com</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<a class="navbar-brand" href="logout.php">logout</a>
          <ul class="nav navbar-nav">
            <li class="active"><a href="">home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	<div class="container">
			
		<div class="col-lg-12">
			<center>
				<h2>
				<?php
				
				require_once 'connection.php';
				
				session_start();

				if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
				{
					header("location: index.php");
				}
				
				$id = $_SESSION['user_login'];
				
				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_login']))
				{
				?>
					Welcome,
				<?php
						echo $row['username'];
				}
				?>
				you can now add, update or delete any regulation!!
				</h2>
					
			</center>
			
		</div>
		
	</div>	
	</div>
										
	</body>
</html>


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
	<a style="margin-left:1220px; " href="adding.php">Add new regulation </a>
		<table class="table table-bordered">
			<thead class="alert-danger">
				<tr>
					<th>Article</th>
					<th>Content</th>
					<th>Action</th>
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
					<td><a href="edit_regulation.php?id=<?php echo $row['reg_id']?>">Edit </a> | <a href="delete_regulation.php?id=<?php echo $row['reg_id']?>"> Delete </a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>