<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GlobalCom</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	<link rel="stylesheet" href="css/principal.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

</head>
<body> 

	<header>
			<direccion class="hidden-xs col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="container">	
					<img src="imagen/pos.png" width="16" height="16" float="left"> 25 de Mayo 305     .
					<img src="imagen/tel.png" width="16" height="16" float="left"> 0358 - 465-1236      .
					<img src="imagen/mail.png" width="16" height="16" float="left"> gc.globalcom@gmail.com    .
				</div>
					</direccion>
			<div class="container">
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
					<a href="index.php"><img src="imagen/Logo.png" width="362" height="109" class="img-responsive"/> </a> 
				</div> 
				<div class="col-xs-12 col-sm-6 col-md-7 col-lg-7" style="padding-top: 15px;">
					<div class="col-xs-3 col-sm-4 col-md-2 col-lg-2">
						<a href="carrito.php"> <img src="imagen/cart.png" width="100" style="height: 80px; width: 85px;"/>
						</a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9" style="padding-top: 10px;">
						
						<a> <p><b>Mi Compra</b></p>
						<p>$ <?php
						if (isset($_POST['mas'])) {
							for ($i=1; $i <= $_SESSION['cont']; $i++) { 
									$arti = $_SESSION['articulo'.$i];
									$cant = $_SESSION['cantidad'.$i];
									if ($arti['CodBArti'] == $_POST['mas']) {
										$cant = $cant + 1 ;
										$_SESSION['cantidad'.$i] = $cant ;
										$_SESSION['total'] = $_SESSION['total'] + $arti['PreAArti'] ;
									}
								}	
							}

							if (isset($_POST['menos'])) {
							for ($i=1; $i <= $_SESSION['cont']; $i++) { 
									$arti = $_SESSION['articulo'.$i];
									$cant = $_SESSION['cantidad'.$i];
									if ($arti['CodBArti'] == $_POST['menos']) {
										$cant = $cant - 1 ;
										$_SESSION['cantidad'.$i] = $cant ;
										$_SESSION['total'] = $_SESSION['total'] - $arti['PreAArti'] ;
									}
								}	
							}

						if (isset($_POST['id'])) {
							for ($i=1; $i <= $_SESSION['cont']; $i++) { 
									$arti = $_SESSION['articulo'.$i];
									$cant = $_SESSION['cantidad'.$i];
									if ($arti['CodBArti'] == $_POST['id']) {
										unset($_SESSION['articulo'.$i]);
										unset($_SESSION['cantidad'.$i]);
										$_SESSION['total'] = $_SESSION['total'] - $arti['PreAArti'] * $cant ;
									}
								}	
							}
								if (!isset($_SESSION['total'])) {
									?> 0.00 <?php
								} else { 

						 echo($_SESSION['total']);  } 

						 ?></p>
						</a>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-default">
			<div class="container">	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li class="dropdown"><a  href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <span class="caret"></span></a>
							<ul class="dropdown-menu">
							<?php

							include("conexion.php"); 
							$gen =  mysqli_query($conectado,"SELECT * FROM categoria ORDER BY NombCate ASC");
    		 				while( $tipo = mysqli_fetch_array($gen) ) {
			
								echo "<li><a href='index.php?categoria=".$tipo['CodiCate']."'>".$tipo['NombCate']."</a></li>" ;
								} ?>
								
							</ul>
							</li>
							<li><a href="servicios.php">Servicios</a></li>
							<li><a href="empresa.php">Empresa</a></li>
							<li><a href="contacto.php">Contacto</a></li>
							

						</ul>

						<form method="POST" action="index.php" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input name="buscar" type="text" class="form-control" placeholder="¿Que buscas?">	
							</div>
							<button type="submit" class="btn btn-default">Buscar</button>
						</form>
					</div>
				</div>
			
			</nav>
	</header>
	<div class="container">
		<div class="row">
		<?php
		 if (isset($_POST['compra'])) {
							if ($_REQUEST['nombre']=="" or $_REQUEST['email']=="") {
								echo "<div class='alert alert-danger'>Debe completar su Nombre y su Email para realizar la compra.</div>" ;
							} else
							{
								$retiro = $_POST['optradio'] ;
								if ($retiro=="Lo retiro en sucursal") {
									$menvio = "Lo retiro en sucursal";
									}else{
										$menvio = "Lo acuerdo con el vendedor";
									}
								$_SESSION['email'] = $_REQUEST['email'];
								$_SESSION['name'] = $_REQUEST['nombre'];
								for ($i=1; $i <= $_SESSION['cont']; $i++) { 
								$arti = $_SESSION['articulo'.$i];
								$cant = $_SESSION['cantidad'.$i];
								if (!isset($arti['CodBArti'])) {
								}
								else
								{
								$mensaje  = 'CARRITO DE COMPRAS';  
							     
							    
								    $mensaje .= ' Articulo:'.$arti['NombArti']. 
								      ' Precio: $'.$arti['PreAArti']. 
								      ' Cantidad: '.$cant. 
								      ' Subtotal: $'.$arti['PreAArti'] * $cant. "\r\n"; 
								}}
								$mensaje .= " Compra de: ".$_REQUEST['nombre'].". \r\n 
								Email: ".$_REQUEST['email']."  \r\n 
								Comentario: ".$_REQUEST['comentario']."   
								\r\n \r\n 
								Total del pedido $: ".$_SESSION['total']."\r\n \r\n Envio:". $menvio. "" ;
								
								mail('gc.globalcom@gmail.com', 'Compra Web', $mensaje);
							
								echo "<script language='javascript'>window.location='compramp.php'</script>" ;
								//header('Location: compramp.php'); 



}






															/*
							require_once('phpmailer/class.phpmailer.php'); 
							require_once("phpmailer/class.smtp.php"); 

							$mail = new PHPMailer(); // defaults to using php "mail()" 
							..... 
							..... 
							$mail->Subject = "Carrito de Compras Online"; 

							$mail->IsHTML(true); 
							if($carro){ 

							$body  = 'CARRITO DE COMPRAS';  
							    $body .= '<table width="399" border="1"> 
							    <tr> 
							    <td width="64" height="20">Producto</td> 
							    <td width="236">Categoria</td> 
							    <td width="204">Linea</td> 
							    <td width="82" height="20">Precio</td> 
							    <td height="20" colspan="2" align="center">Cantidad de Unidades</td> 
							    </tr>'; 
							  $color=array("#ffffff","#F0F0F0"); 
							  $contador=0; 
							  $suma=0; 
							   foreach($carro as $k => $v){ 
							   $subto=$v['cantidad']*$v['precio']; 
							   $suma=$suma+$subto; 
							   $contador++; 
							    $body .= '<tr> 
							    <td height="20">'.$v['id_articulo'].'</td> 
							      <td height="20">'.$v['categoria'].'</td> 
							      <td height="20">'.$v['linea'].'</td> 
							      <td height="20">'.$v['precio'].'</td> 
							      <td width="45" height="20" align="center">'.$v['cantidad'].'</td> 
							    </tr>'; 
							} 
							$mail->Body = $body;  

							$mail->Send();  

							// Notificamos al usuario del estado del mensaje  
							if(!$mail->Send()){  

							   echo "<br/>".$mail->ErrorInfo; //Esto te muestra el error que ha producido al intentar enviar el correo   
							}else{  
							   echo "Mensaje enviado";  
							}  
							}  */


						} ?>




			<div class="hidden-xs col-sm-1">
				<u><b>Imagen</b></u>
			</div>
			<div class="col-xs-4 col-sm-3">
				<u><b>Producto</b></u>
			</div>
			<div class="col-xs-2 col-sm-1">
				<u><b>Precio</b></u>
			</div>
			<div class="col-xs-1 col-sm-1">
				
			</div>
			<div class="col-xs-1 col-sm-1" style="text-align: center;">
				<u><b>Cantidad</b></u>
			</div>
			<div class="col-xs-1 col-sm-1">
				
			</div>
			<div class="col-xs-2 col-sm-1">
				<u><b>Subtotal</b></u>
			</div>
			<div class="col-xs-1 col-sm-1">
				
			</div>
		</div>	
	</div>

	<div class="container">
		<?php 

		for ($i=1; $i <= $_SESSION['cont']; $i++) { 
			$arti = $_SESSION['articulo'.$i];
			$cant = $_SESSION['cantidad'.$i];
			if (!isset($arti['CodBArti'])) {
			}
			else
			{
		?>
		<div class="row" style="height: 30px;">
			<div class="hidden-xs col-sm-1">
				<?php echo "<a id='codigo' href='compra.php?codigo=".$arti['CodBArti']."'><img src='productos/".$arti['CodBArti'].".jpg' style='height:50px;' ></a>" ?>
			</div>
			<div class="col-xs-4 col-sm-3" style="padding-top: 15px;">
				<?php echo($arti['NombArti']); ?>
			</div>
			<div class="col-xs-2 col-sm-1" style="padding-top: 15px;">
				<?php echo($arti['PreAArti']); ?>
			</div>
			<div class="col-xs-1 col-sm-1">
			<form method="POST" action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
							<?php echo	"<input name='menos' type='hidden' class='form-control' value='" .$arti['CodBArti']."''>" ?>	
							
							<?php if ($cant > 0) { ?>
								<button type="submit" class="btn btn-default">-</button>
							<?php }
							else
							{ ?>
							 <button type="submit" class="btn btn-default" disabled="true">-</button>
							 <?php
							}
							?>
							</div>
						</form>
						</div>
				<div class="col-xs-1 col-sm-1" style="padding-top: 15px; text-align: center;">
				<?php
				if ($cant > $arti['StocArti']) {
					$cant = $arti['StocArti'];
				}
				 echo($cant); ?>
				 </div>
				 <div class="col-xs-1 col-sm-1">
				<form method="POST" action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
							<?php echo	"<input name='mas' type='hidden' class='form-control' value='" .$arti['CodBArti']."''>" ?>	
							
							<?php if ($cant < $arti['StocArti']) { ?>
								<button type="submit" class="btn btn-default">+</button>
							<?php }
							else
							{ ?>
							 <button type="submit" class="btn btn-default" disabled="true">+</button>
							 <?php
							}
							?>
							</div>
						</form>
						</div>
			
			<div class="col-xs-2 col-sm-1" style="padding-top: 15px;">
				<?php echo($arti['PreAArti'] * $cant) ; ?>
			</div>
			<div class="col-xs-1 col-sm-1" >
				<form method="POST" action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
							<?php echo	"<input name='id' type='hidden' class='form-control' value='" .$arti['CodBArti']."''>" ?>	
							<button type="submit" class="btn btn-default">Eliminar</button>
							</div>
						</form>
			</div>
			</div>
			</br>
			</br>
			<?php } 	} ?>
			<form class="form-horizontal" method="POST" action="" role="form">
			<div class="row">
				<div class="col-xs-12">
					<u><b>Metodos de envio</b></u>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="radio">
				  <label><input type="radio" name="optradio" value="Lo retiro en sucursal" checked="true">Lo retiro en secursal</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="radio">
					  <label><input type="radio" name="optradio" value="Lo acuerdo con el vendedor">Lo acuerdo con el vendedor</label>
					  </div>
				</div>
			</div>



			<div class="row">
				<div class="col-xs-12">
				</br>
			</br>
					<u><b>Datos del Comprador</b></u>
				</div>
			</div>
			<div class="row">
				<div class='col-xs-12 col-sm-6'>
				<h3></h3>
				
  					<div class="form-group">
    					<label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre</label>
    					<div class="col-lg-10">
     					 <input type="text" class="form-control" name="nombre"
             				placeholder="Nombre">
    					</div>
  					</div>
  					<div class="form-group">
    					<label for="ejemplo_email_3" class="col-lg-2 control-label">Email</label>
    					<div class="col-lg-10">
     					 <input type="email" class="form-control" name="email"
             				placeholder="Email">
    					</div>
  					</div>
  					<div class="form-group">
    					<label for="ejemplo_email_3" class="col-lg-2 control-label">Comentario</label>
    					<div class="col-lg-10">
     					 <textarea class="form-control" rows="4" name="comentario"
             				placeholder="Comentario o Consulta"></textarea>
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<div class="col-lg-offset-2 col-lg-10">
      					<button name="compra" type="submit" class="btn btn-default">Confirmar Compra</button>
    					</div>
  					</div>
				

			</div>
			</div>
			</form>


		</div>
		

	</div>
	

	<div id="footer">
      <div class="well">
        <p class="text-muted credit" style="text-align: center">GlobalCom © Copyright 2016 </p>
     	<p class="text-muted credit" style="text-align: center">25 de Mayo y Alberdi - Río Cuarto - Córdoba</p>
     	<p class="text-muted credit" style="text-align: center">0358 - 465-1236 | gc.globalcom@gmail.com </p>
      </div>
    </div>


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>