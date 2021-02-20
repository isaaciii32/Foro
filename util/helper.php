<?php 
	include'./DB/users.php';
	session_start();

	function redirect($page)
	{
		header("Location: ./".$page);
	}


	function only_admin()
	{
		if (isset($_SESSION['user_id'])) {
			$user_id=$_SESSION['user_id'];
			$perfil = get_perfil($user_id);
			if ($perfil == 1) {
				
			}
			else
			{
				redirect('landing.php');
			}


		}
		else
		{
			redirect('index.php');
		}
	}

	function user_type()
	{
		if (isset($_SESSION['user_id'])) {
			$user_id=$_SESSION['user_id'];
			$perfil = get_perfil($user_id);

			if ($perfil == 1) {
				echo '<li class="nav-item active">
                		<a class="nav-link" href="admin.php">Lista de Usuarios</a>
            		</li>';
			}
			


		}
	}

	

?>