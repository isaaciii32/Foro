	<?php
	
	

	function get_recent()
	{
		$conn = connect();
		$sql = "select tema.NOMBRE as TEMA,tema.USUARIO_ID_USUARIO,tema.FECHA,tema.ID_TEMA,usuario.NOMBRE, usuario.ID_USUARIO from tema inner join usuario on tema.USUARIO_ID_USUARIO=usuario.ID_USUARIO order by FECHA desc ";
		$result = $conn->query($sql);
		$conn->close();

		if ($result->num_rows > 0) {
			$c = 0;
			while ($row = $result->fetch_assoc()) {
				$tema_name = $row["TEMA"];
				$user_name = $row["NOMBRE"];
				$tema_id = $row['ID_TEMA'];
				

				echo'<div class="media pt-3">
	            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	                <strong class="d-block text-gray-dark">@'.$user_name.'</strong>
	                '.$tema_name.'
	            </p>
	            <small class="d-block text-right mt-3">
	            	<form action="topic.php" method="post">
	            	<input type="hidden" value="'.$tema_id.'" name="tema_id">
	            	<input type="submit" class="linksCont" value="ver tema">
	            	</form>
	            </small>
	        	</div>';
	        	$c = $c + 1;

	        	if ($c >= 3) {
	        		break;
	        	}


			}
		}
		else
		{
			echo "algo salio mal";
		}
	}

	function create_tema($cont,$name,$user_id)
	{
		$conn = connect();
		$sql = "insert into tema (CONTENIDO,NOMBRE,USUARIO_ID_USUARIO) values ('".$cont."','".$name."','".$user_id."')";
		$conn->query($sql);
	}

	function get_tema_id($user_id)
	{
		$conn = connect();
		$sql = "select ID_TEMA,USUARIO_ID_USUARIO,FECHA from tema where USUARIO_ID_USUARIO = ".$user_id." order by FECHA desc ";
		$result=$conn->query($sql);
		$conn->close();

		$row = mysqli_fetch_row($result);
		return $row[0];
	}

	function add_to_catg($tema_id,$catg_id)
	{
		$conn = connect();
		$sql = "insert into categoria_has_tema (CATEGORIA_ID_CATEGORIA,TEMA_ID_TEMA) values (".$catg_id.",".$tema_id.")";
		$conn->query($sql);
		


	}


	function get_for_catg()
	{
		$conn = connect();

		$sql = "select TEMA_ID_TEMA from categoria_has_tema";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$tema_id=$row['TEMA_ID_TEMA'];

				$sql2 = "select tema.NOMBRE as TEMA,tema.USUARIO_ID_USUARIO,tema.FECHA,usuario.NOMBRE, usuario.ID_USUARIO from tema inner join usuario on tema.USUARIO_ID_USUARIO=usuario.ID_USUARIO where ID_TEMA = '".$tema_id."'";
				$result2 = $conn->query($sql2);
				

				if ($result2->num_rows > 0) {
					$c = 0;
					while ($row2 = $result2->fetch_assoc()) {
						$tema_name = $row2["TEMA"];
						$user_name = $row2["NOMBRE"];
						

						echo'<div class="media pt-3">
			            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			                <strong class="d-block text-gray-dark">@'.$user_name.'</strong>
			                '.$tema_name.'
			            </p>
			            <small class="d-block text-right mt-3">
			                <a class="linksCont" href="topic.html">Ver tema</a>
			            </small>
			        	</div>';
			        	$c = $c + 1;

			        	if ($c >= 1) {
			        		break;
			        	}


					}
				}
				else
				{
					echo "algo salio mal";
				}
			}
		}

		
	}

	function get_one_catg($catg_id)
	{
		$conn = connect();

		$sql = "select * from categoria_has_tema where CATEGORIA_ID_CATEGORIA ='".$catg_id."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$tema_id=$row['TEMA_ID_TEMA'];

				$sql2 = "select tema.NOMBRE as TEMA,tema.USUARIO_ID_USUARIO,tema.FECHA,usuario.NOMBRE, usuario.ID_USUARIO from tema inner join usuario on tema.USUARIO_ID_USUARIO=usuario.ID_USUARIO where ID_TEMA = '".$tema_id."'";
				$result2 = $conn->query($sql2);
				

				if ($result2->num_rows > 0) {
					$c = 0;
					while ($row2 = $result2->fetch_assoc()) {
						$tema_name = $row2["TEMA"];
						$user_name = $row2["NOMBRE"];
						

						echo'<div class="media pt-3">
			            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			                <strong class="d-block text-gray-dark">@'.$user_name.'</strong>
			                '.$tema_name.'
			            </p>
			            <small class="d-block text-right mt-3">
			                <a class="linksCont" href="topic.html">Ver tema</a>
			            </small>
			        	</div>';
			        	$c = $c + 1;

			        	if ($c >= 1) {
			        		break;
			        	}


					}
				}
				else
				{
					echo "algo salio mal";
				}
			}
		}

		
	}

	function get_tema_name($tema_id)
	{
		$conn = connect();
		$sql = "select NOMBRE from tema where ID_TEMA = '".$tema_id."' ";
		$result=$conn->query($sql);
		$conn->close();

		$row = mysqli_fetch_row($result);
		return $row[0];
	}

	function get_tema_fecha($tema_id)
	{
		$conn = connect();
		$sql = "select FECHA from tema where ID_TEMA = '".$tema_id."' ";
		$result=$conn->query($sql);
		$conn->close();

		$row = mysqli_fetch_row($result);
		return $row[0];
	}

	function get_user_id($tema_id)
	{
		$conn = connect();
		$sql = "select USUARIO_ID_USUARIO from tema where ID_TEMA = '".$tema_id."' ";
		$result=$conn->query($sql);
		$conn->close();

		$row = mysqli_fetch_row($result);
		return $row[0];

	}

	function get_content($tema_id)
	{
		$conn = connect();
		$sql = "select CONTENIDO from tema where ID_TEMA = '".$tema_id."' ";
		$result=$conn->query($sql);
		$conn->close();

		$row = mysqli_fetch_row($result);
		return $row[0];
		
	}

	
	
	function create_resp($cont,$tema_id,$user_id)
	{
		$conn = connect();
		$sql = "insert into respuesta (CONTENIDO,TEMA_ID_TEMA,USUARIO_ID_USUARIO) values ('".$cont."','".$tema_id."','".$user_id."')";
		$conn->query($sql);
	}

	function get_resp($tema_id)
	{
		$conn = connect();
		$sql = "select * from respuesta where TEMA_ID_TEMA = '".$tema_id."' order by FECHA asc";
		$result=$conn->query($sql);
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				$resp_user = $row["USUARIO_ID_USUARIO"];
				$cont = $row['CONTENIDO'];
				$date = $row['FECHA'];

				$sql2 = "select NOMBRE from usuario where ID_USUARIO = '".$resp_user."' ";
				$result2=$conn->query($sql2);
				if ($result2->num_rows > 0) {
					while ($row2 = $result2->fetch_assoc()) {
						$user_name = $row2['NOMBRE'];
						$rute=get_img($resp_user);

						echo '    <div class="my-3 p-3 rounded shadow-sm contBG1 border border-danger">
        <div class="row">
            <div class="col-sm-2">
                <div class="profile-img">
                    <img src="'.$rute.'" alt=""/>
                </div>
                <hr>
                <h6>@'.$user_name.'</h6>
                <p>'.$date.'</p>
            </div>
            <div class="col-">
                <hr class="vertical-secundario">
            </div>
            <div class="col-md-8">
                <p>'.$cont.'</p>
            </div>
        </div>
    </div>';
					}
				}

			}
		}
	}

	function get_all()
	{
		$conn = connect();
		$sql = "select tema.NOMBRE as TEMA,tema.USUARIO_ID_USUARIO,tema.FECHA,tema.ID_TEMA,usuario.NOMBRE, usuario.ID_USUARIO from tema inner join usuario on tema.USUARIO_ID_USUARIO=usuario.ID_USUARIO order by FECHA asc ";
		$result = $conn->query($sql);
		$conn->close();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$tema_name = $row["TEMA"];
				$user_name = $row["NOMBRE"];
				$tema_id = $row['ID_TEMA'];
				

				echo'<div class="media pt-3">
	            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	                <strong class="d-block text-gray-dark">@'.$user_name.'</strong>
	                '.$tema_name.'
	            </p>
	            <small class="d-block text-right mt-3">
	            	<form action="topic.php" method="post">
	            	<input type="hidden" value="'.$tema_id.'" name="tema_id">
	            	<input type="submit" class="linksCont" value="ver tema">
	            	</form>
	            </small>
	        	</div>';
	        	

			}
		}
		else
		{
			echo '<div class="media pt-3">
		            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		                <strong class="d-block text-gray-dark">OOOOOOPS NO HAY NADA QUE MOSTRAR</strong>
		            </p>
		            <small class="d-block text-right mt-3">
		                <a class="linksCont" href="newtopic.php">Nueva discusion</a>
		            </small>
        		</div>';
		}
	}

	function trend()
	{
		$conn = connect();
		$sql = "select ID_TEMA from tema order by FECHA  desc";
		$result=$conn->query($sql);

		if ($result->num_rows > 0) {
			$c = 0;
			while ($row = $result->fetch_assoc()) {
				$max_id = $row['ID_TEMA'];
	        	$c = $c + 1;

	        	if ($c > 1) {
	        		break;
	        	}
			}
		}

		$max_id=$max_id+1;
		$cant_resp = array();

		for ($i=1; $i < ($max_id+1); $i++) { 
			$sql2 = "select ID_RESPUESTA from respuesta where TEMA_ID_TEMA ='".$i."'";
			$result2=$conn->query($sql2);
			$cant_resp[$i] = $result2->num_rows;
		}

		$mayor = $cant_resp[1];

		for ($i=1; $i < ($max_id+1) ; $i++) { 
			if ($cant_resp[$i] > $mayor) {
				$mayor = $cant_resp[$i];
				$mayor_id = $i;
			}
		}

		$sql3 = "select tema.NOMBRE as TEMA,tema.USUARIO_ID_USUARIO,tema.FECHA,tema.ID_TEMA,usuario.NOMBRE, usuario.ID_USUARIO from tema inner join usuario on tema.USUARIO_ID_USUARIO=usuario.ID_USUARIO where ID_TEMA = '".$mayor_id."' order by FECHA desc ";
		$result3 = $conn->query($sql3);
		$conn->close();

		if ($result3->num_rows > 0) {
			$c = 0;
			while ($row3 = $result3->fetch_assoc()) {
				$tema_name = $row3["TEMA"];
				$user_name = $row3["NOMBRE"];
				$tema_id = $row3['ID_TEMA'];
				

				echo'<div class="media pt-3">
	            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	                <strong class="d-block text-gray-dark">@'.$user_name.'</strong>
	                '.$tema_name.'
	            </p>
	            <small class="d-block text-right mt-3">
	            	<form action="topic.php" method="post">
	            	<input type="hidden" value="'.$tema_id.'" name="tema_id">
	            	<input type="submit" class="linksCont" value="ver tema">
	            	</form>
	            </small>
	        	</div>';
	        	$c = $c + 1;

	        	if ($c >= 3) {
	        		break;
	        	}


			}
		}
		else
		{
			echo "No hay tema destacado";
		}


	}






 ?>