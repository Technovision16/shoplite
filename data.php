<?php
session_start();
class data
{
	function register($mob,$name)
	{
		include 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$query="CREATE TABLE IF NOT EXIST register (
			id int primary key auto_increment unique not null,
			mob varchar(10) not null,
			name varchar(255) not null,
			customer id varchar(255) unique not null,
			FOREIGN KEY (id) REFERENCES shop(id)
		) ENGINE=INNODB;";
		
		if($bd->query($query)) or die("Query is not run");

		$query="INSERT INTO register VALUES(null,'$mob','$name','$c_id')";

		if($bd->query($query))
		{
			$query="SELECT id FROM register WHERE customer id='$c_id'";
			$result=$bd->query($query);
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				$id=$row['id'];
				$_SESSION['start']=$id;
				header('Location: shop.php');
			}
			else
			{
				$_SESSION['error']="You are not registered";
				header('Location: index.php');
			}
		}
		else
		{
			$_SESSION['error']="Query Failed to run";
				header('Location: index.php');
		}

	}
}