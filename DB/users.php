<?php 
	
	include'conection.php';

	function create_user($nombre,$email,$pass) {
		$conn=connect();
		$hashed_pass = crypt($pass,"unu");
		$sql = "insert into usuario (NOMBRE,EMAIL,PASSWD,PERFILES_ID_PERFIL,IMAGENES_ID_IMAGEN) values('".$nombre."','".$email."','".$hashed_pass."',2,1)";
		
		if ($conn->query($sql) === TRUE) {
			echo '<script language="javascript">alert("Usuario registrado");</script>';
		}
		else
		{
			echo '<script language="javascript">alert("error de registro '.$conn->error.'");</script>';
		}
	}

	function login($email, $pass) {
		$hashed_pass = crypt($pass,"unu");
		$conn = connect();
		$sql = "select * from usuario where EMAIL = '".$email."' and PASSWD = '".$hashed_pass."'";
		$result = $conn->query($sql);

		if (!$result) {
	        trigger_error('Invalid query: ' . $conn->error);
	    }

		$conn->close();

		echo $result->num_rows;

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				return $row["ID_USUARIO"];
			}
		}
		else
		{
			return FALSE;
		}
	}

	function get_name($user_id)
	{
		$conn = connect();
		$sql = "select * from usuario where ID_USUARIO = '".$user_id."'";
		$result = $conn->query($sql);
		$conn->close();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				return $row["NOMBRE"];
			}
		}
		else
		{
			return FALSE;
		}
	}

	function get_email($user_id)
	{
		$conn = connect();
		$sql = "select * from usuario where ID_USUARIO = '".$user_id."'";
		$result = $conn->query($sql);
		$conn->close();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				return $row["EMAIL"];
			}
		}
		else
		{
			return FALSE;
		}
	}

	function get_img($user_id)
	{
		$conn = connect();
		$sql = "select * from usuario where ID_USUARIO = '".$user_id."'";
		$result = $conn->query($sql);
		

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$img_id = $row["IMAGENES_ID_IMAGEN"];
			}

			$img_id += 0;

			$sql2 = "select * from imagenes where ID_IMAGEN = '".$img_id."'";
			$result2 = $conn->query($sql2);
			$conn->close();
			while ($row2 = $result2->fetch_assoc()) {
				$img_name = $row2["NOMBRE"];
			}

			$img_rute = "userImg/".$img_name.".png";

			return $img_rute;

		}
		else
		{
			return FALSE;
		}
	}

	function set_img($user_id)
	{
		$conn = connect();
		$sql = "update usuario set IMAGENES_ID_IMAGEN = ".$user_id." where ID_USUARIO ='".$user_id."'";
		$result = $conn->query($sql);
		$conn->close();
	}

	function create_img($name)
	{
		$conn = connect();
		$sql = "insert into imagenes (ID_IMAGEN,NOMBRE) values ('".$name."','".$name."')";
		$conn->query($sql);
	}

	function get_fecha($user_id)
	{
		$conn = connect();
		$sql = "select * from usuario where ID_USUARIO = '".$user_id."'";
		$result = $conn->query($sql);
		$conn->close();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				return $row["FECHA_CREACION"];
			}
		}
		else
		{
			return FALSE;
		}
	}

	function create_admin($nombre,$email,$pass) {
		$conn=connect();
		$hashed_pass = crypt($pass,"unu");
		$sql = "insert into usuario (NOMBRE,EMAIL,PASSWD,PERFILES_ID_PERFIL,IMAGENES_ID_IMAGEN) values('".$nombre."','".$email."','".$hashed_pass."',1,1)";
		
		if ($conn->query($sql) === TRUE) {
			echo '<script language="javascript">alert("Usuario registrado");</script>';
		}
		else
		{
			echo '<script language="javascript">alert("error de registro '.$conn->error.'");</script>';
		}
	}

	function show_users()
	{
		$conn = connect();
		$sql = "select usuario.NOMBRE,usuario.EMAIL,usuario.PERFILES_ID_PERFIL, perfiles.ID_PERFIL, perfiles.NOMBRE as TIPO from usuario inner join perfiles on usuario.PERFILES_ID_PERFIL = perfiles.ID_PERFIL ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$user_name = $row['NOMBRE'];
				$user_email = $row['EMAIL'];
				$user_type = $row['TIPO'];

				echo '  <tr>
                            <td class="filterable-cell">'.$user_name.'</td>
                            <td class="filterable-cell">'.$user_email.'</td>
                            <td class="filterable-cell">'.$user_type.'</td>
                        </tr>';
				
			}
		}
	}

	function get_perfil($user_id)
	{
		$conn = connect();
		$sql = "select * from usuario where ID_USUARIO = '".$user_id."'";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				return $row["PERFILES_ID_PERFIL"];
			}
		}
		else
		{
			return FALSE;
		}
	}

 ?>