<?php
	require_once 'connection.php';
 
	if(ISSET($_POST['update'])){
		try{
			$id = $_GET['id'];
			$article = $_POST['article'];
			$content = $_POST['content'];
		
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `reg`SET `article` = '$article', `content` = '$content' WHERE `reg_id` = '$id'";
			$db->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$db = null;
		header('location:home.php');
	}
?>