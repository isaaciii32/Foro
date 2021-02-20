<?php 
    
    include'util/helper.php';
    $name = $_SESSION['user_id'];
    $dir_subida ="./userImg/";
    $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']);
    move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido.$name.".png");
    create_img($name);
    set_img($name);
    redirect("profile.php");


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 
 </body>
 </html>