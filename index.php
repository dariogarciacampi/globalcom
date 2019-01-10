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
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="style.css">

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


	<div class="social">
		<ul>
			<li><a href="https://www.facebook.com/GlobalCom-1594980334101154/?fref=ts" target="_blank" class="icon-facebook"></a></li>
			<li><a href="https://twitter.com/GlobalCom_RioIV" target="_blank" class="icon-twitter"></a></li>
		</ul>
	</div>



	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			    
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
				      <img src="carrusel/carrusel1.jpg" alt="Chania" class="img-responsive">
				    </div>

				    <div class="item">
				      <img src="carrusel/carrusel2.jpg" alt="Chania" class="img-responsive">
				    </div>
			  

				  	<div class="item">
				      <img src="carrusel/carrusel3.jpg" alt="Chania" class="img-responsive">
				    </div>

				    <div class="item">
				      <img src="carrusel/carrusel4.jpg" alt="Chania" class="img-responsive">
				    </div>
				  </div>
			  
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<img src="imagen/juegosps3.jpg" class="img-responsive"/>
		<img src="imagen/gamepad.gif" class="img-responsive"/>
		</div>

	</div>
	<div class="container">
		
		<div class="row">
			<?php
			if (isset($_REQUEST['categoria'])){
				$arti =  mysqli_query($conectado,"SELECT NombArti, CodBArti, PreAArti, PreOArti FROM articulos WHERE CodiCate=".$_REQUEST['categoria']."");
				$titulo="";
			}
			elseif (isset($_POST['buscar'])) {
				$arti =  mysqli_query($conectado,"SELECT NombArti, CodBArti, PreAArti, PreOArti FROM articulos WHERE NombArti LIKE '%".$_POST['buscar']."%' ");
				$titulo = "Busqueda: ".$_POST['buscar']."" ;
			}
			elseif (isset($_POST['agregar'])) {
				if (!isset($_SESSION['cart'])) {
					$c=0;
					$total = 0;
					}else {
						foreach ($carro as $producto) {
							if (in_array($_POST['id'], $producto)){
								$carro[$producto['id']]['cantidad'] = $carro['cantidad'] + 1 ;
								$total = $total + $carro['precio'];
							} else {
							$carro[$c] = array('id' =>$_POST['id'] ,'nombre' => $_POST['nombre'] ,'precio' => $_POST['precio'] , 'cantidad'=> $_POST['cantidad']);
							$c=$c+1;
							$total = $total + $carro['precio'];
							$_SESSION['cart'] = $carro;
							}
						}
					}

				}
			
			else
			{
				/* esta sentencia ORDER BY rand() es para modo random Se reemplaza por ORDER BY CodiArti DESC*/
			$arti =  mysqli_query($conectado,"SELECT NombArti, CodBArti, PreAArti, PreOArti, CodiArti FROM articulos ORDER BY CodiArti DESC limit 15");
    		$titulo="" ;
    		 }
    		 echo "<h4><small>".$titulo."</small></h4>" ;
    		 while( $artic = mysqli_fetch_array($arti) ) {
				echo "<div class='col-xs-6 col-sm-6 col-md-4 col-lg-3'>" ;
    			print "<div class='thumbnail'>" ;
      			print	"<a id='codigo' href='compra.php?codigo=".$artic['CodBArti']."'><img src='productos/".$artic['CodBArti'].".jpg' class='img-responsive img-thumbnail'></a>" ; ?>
      					<div class="caption">
      					<table>
      							<tr>
      								<td style="height:80px;"><h5><?php echo $artic["NombArti"] ; ?> <small><?php echo $artic["CodBArti"] ; ?></small></h5></td>
      							</tr>
      					</table>
        					
        						<h4 class="text-success" style="text-align: center;"><!-- <small><s>Efectivo $--><?php /* echo $artic["PreAArti"] */?> <!-- </s>    </small>    </br> --> <small>Contado</small> $<?php echo $artic["PreAArti"] ?> </h4>
						</div>
				</div>	
			</div>
			
				
				
<?php } 
?>
			
		</div>	

	</div>
	
<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyEgsSBXVzZXJzGICAoPyE2bQJDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->



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