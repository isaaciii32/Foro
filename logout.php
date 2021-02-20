<?php 
	
    include'util/helper.php';
    session_start();

	session_unset();
	session_destroy();

	redirect('index.php');

 ?>