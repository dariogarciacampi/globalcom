<?php session_start();

	 if(isset($_POST["email"]) OR ($_POST["password"]))
 {
 	$usuario = $_POST["email"];
 	$usuario = strtoupper($usuario);
						include("conexion.php");
		            	$result = mysqli_query($conectado,"SELECT PassUsua, usuario.CodiEmpr, EstaUsua ,CodiUsua, EstaEmpr, NombEmpr from usuario inner join empresa on empresa.CodiEmpr = usuario.CodiEmpr WHERE usuario.NombUsua = '".$usuario."'");
		            	if(mysqli_num_rows($result) > 0){
		            		$dato = mysqli_fetch_array($result);
		            		if ($dato["PassUsua"] == $_POST["password"]){
		            			if (($dato["EstaUsua"] == "No Activo") OR ($dato["EstaEmpr"] == "No Activo")) {
		            				echo("Usted no se encuentra autorizado");
		            			} else {
		            			$_SESSION["user"] = $usuario ;
		            			$_SESSION["empresa"] = $dato["NombEmpr"] ;
		            			$_SESSION["estadou"] = $dato["EstaUsua"] ;
		            			$_SESSION["estadoe"] = $dato["EstaEmpr"] ;
		            			$_SESSION["estadoe"] = $dato["EstaEmpr"] ;
		            			$_SESSION["codigou"] = $dato["CodiUsua"] ;
		            			$_SESSION["codigoe"] = $dato["CodiEmpr"] ;
		            			echo 1;
		            			
		            		}
		            		}else {
		            			echo ("El password ingresado es incorrecto");
		            		}
		            	}else {
		            		echo("El usuario ingresado es incorrecto");
		            		
		            	}
}



?>