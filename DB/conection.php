<?php 

function connect() {

	$host='localhost';
	$username='root';
	$password='';
	$dbname='foro';

	$conn=new mysqli($host,$username,$password,$dbname);

	if ($conn->error) {
		die('Error de conexion'.$conn->error);
	}

	
	return $conn;

}