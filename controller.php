<?php 
	include 'model.php';
	$database = new database();
	$action   = $_GET['action'];

	if($action == "insert"){
		$book_name 		= $_POST['book_name'];
		$author 		= $_POST['author'];
		$publisher 		= $_POST['publisher'];
		$date_published = $_POST['date_published'];
		$price 			= $_POST['price'];
		
		$database->insert($book_name, $author, $publisher, $date_published, $price);
		header("location:index.php");
	} 
	elseif($action == "update"){
		$book_id 		= $_POST['book_id'];
		$book_name		= $_POST['book_name'];
		$author			= $_POST['author'];
		$publisher		= $_POST['publisher'];
		$date_published	= $_POST['date_published'];
		$price			= $_POST['price'];

		$database->update($book_id, $book_name, $author, $publisher, $date_published, $price);
		header("location:index.php");
	}
	elseif($action == "delete"){
		$book_id = $_GET['book_id'];
		
		$database->delete($book_id);
		header("location:index.php");
	}
?>