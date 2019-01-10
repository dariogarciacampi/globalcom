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
								if (!isset($_SESSION['total'])) {
									?> 0.00 <?php
								} else { 

						 echo($_SESSION['total']);  } ?></p>
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
			<?php 
			
				
					echo "<div class='alert alert-danger'>Su pedido ha sido cancelado. Puede volver a intentarlo. <a href='www.globalcom.com.ar/carrito.php'>Click aqui</a></div>" ;
			
			?>
			
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