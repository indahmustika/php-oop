<?php 
	class database{
		var $host		= 'localhost';
		var $port		= '5432';
		var $dbname		= 'crud';
		var $user		= 'postgres';
		var $password	= 'admin';
	
		function __construct(){
			pg_connect("host=$this->host port = $this->port dbname = $this->dbname user = $this->user password = $this->password");
		}

		function select(){
			$query  = "SELECT * FROM book ORDER BY book_id";
			$result = pg_query($query);
			while ($row = pg_fetch_row($result)){
			 	$data[] = $row;
			}
			return $data; 
		}

		function insert($book_name, $author, $publisher, $date_published, $price){
			$query = "INSERT INTO book VALUES (DEFAULT, '$book_name', '$author', '$publisher', '$date_published', '$price')";
			pg_query($query);
		}

		function update($book_id, $book_name, $author, $publisher, $date_published, $price){
			$query = "UPDATE book SET book_name = '$book_name', author = '$author', publisher = '$publisher', date_published = '$date_published', price = '$price' WHERE book_id = '$book_id'";
			pg_query($query);
		}

		function delete($book_id){
			$query = "DELETE FROM book WHERE book_id = '$book_id'";
			pg_query($query);
		}
	}
?>