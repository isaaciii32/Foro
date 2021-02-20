<?php 
	include'util/helper.php';
	include'DB/temas.php';


	if ($_SERVER['REQUEST_METHOD']=="POST") {

        $tema_id = $_POST['tema_id'];
        $user_id = $_POST['user_id'];
        $cont= $_POST['content'];

        create_resp($cont,$tema_id,$user_id);
    }


 ?>