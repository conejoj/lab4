<?php
	$connect = new mysqli("localhost", "root", "", "jbu_db");
	
		if($connect->connect_errno )
		{
			die('Could not connect: ' . $connect->connect_errno);
		}
		
?>