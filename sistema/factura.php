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
	<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>    
        

<!-- Latest compiled and minified CSS -->

<script>

$(document).ready(function(){


$(function() {
  var availableTags = [
    "ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++",
    "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran",
    "Groovy", "Haskell", "Java", "JavaScript / 2034590542", "Lisp", "Perl",
    "PHP", "Python", "Ruby", "Scala", "Scheme"
  ];
  
  $(".autocomplete").autocomplete({
    source: availableTags
  });
});

$(function() {
            $("#articulo").autocomplete({
                source: "acproductos.php",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
                    $('#codigo').val(ui.item.codigo);
          $('#articulo').val(ui.item.descripcion);
          $('#cantidad').val("1");
          $('#iva').val(ui.item.iva);
          $('#total').val(ui.item.precio);
          $('#id_producto').val(ui.item.id_producto);
           }
            });
    });

});

function nueva(){

				    	var codigo = $("#codigo").val();
				    	var articulo = $("#articulo").val();
				    	var cantidad = $("#cantidad").val();
				    	var iva = $("#iva").val();
				    	var total = $("#total").val();

				    	var dataString = 'codigo=' + codigo + '&articulo=' + articulo + '&cantidad=' + cantidad + '&iva=' + iva + '&total=' + total ;
				    $.ajax({
				      url:"nueva.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				        $("#resp").html(respuesta);
				      }
				    });

				  };


</script>
</head>
<body> 

	<header>
		
			<div class="container">
			
				<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3">
				</div> 
				<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
					<a href="index.php"><img src="imagen/Logo.png"  class="img-responsive"/> </a> 
				</div> 
				<div class="col-xs-0 col-sm-1 col-md-2 col-lg-3">
				</div> 
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<nav class="navbar navbar-default" >
				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div>
					<div class="collapse navbar-collapse" id="navbar-1">
					
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="factura.php">Facturacion</a></li>
							<li><a href="cliente.php">Clientes</a></li>
							<li><a href="articulo.php">Articulos</a></li>
							<li><a href="servicios2.php">Servicios</a></li>

						</ul>
						
					</div>
				
			
			</nav>
			</div>
			
	</header>
	<?php if ($_SESSION["codigou"] <>"") {
		
	?>
	<div class="container">

		

		<div class="col-xs-12 col-md-2 column margintop20">
		   <ul class="nav nav-pills nav-stacked">
		  <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Lista de Comprobantes</a></li>
		  <li class="active"><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Nueva</a></li>
		  <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Estadisticas</a></li>
		  <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>IVA Ventas</a></li>
		</ul>
		</div>
	
		<div class="col-xs-12 col-md-10 column margintop20">
			<form class="form-horizontal" id="formulariocliente" method="post" action="" enctype="multipart/form-data">
		
				<div class="form-group">
			        <label class="control-label col-xs-3" >Razon Social/ Nombre:</label>
			        <div class="col-xs-7">
			        	<input class="form-control autocomplete" placeholder="Buscar" />
			        </div>
			        <div class="col-xs-2">
			        <input type="button" id="cliente-btn" class="btn btn-primary" value="+" >
			        </div>	
			    </div>
					
						<div class="form-group">
					        <label class="control-label col-xs-4 col-md-2">CUIT/CUIL/DNI:</label>
					        <div class="col-xs-8 col-md-4">
					            <input type="text" class="form-control" name="dni" id="dni" placeholder="CUIT/CUIL/DNI (Sin guiones)">
					        </div>
				     	
					        <label class="control-label col-xs-4 col-md-2">Direccion:</label>
					        <div class="col-xs-8 col-md-4">
					            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
					        </div>
				     	</div> 

				     	<div class="form-group">
					        <label class="control-label col-xs-4 col-md-2">Telefono:</label>
					        <div class="col-xs-8 col-md-4">
					            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="000-0000000">
					        </div>
				     	
					        <label class="control-label col-xs-4 col-md-2">E-Mail:</label>
					        <div class="col-xs-8 col-md-4">
					            <input type="text" class="form-control" name="email" id="email" placeholder="ejemplo@email.com">
					        </div>
				     	</div>
			    	
			    
			 </form>
		 </div>
		 </div>
		 <div class="container">
				<form>
		 			<div class="col-xs-2">
					    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo">
					</div>
			        <div class="col-xs-4">
			        	<input class="form-control" id="articulo" placeholder="Articulo" required="required">
			        </div>
			        <div class="col-xs-1">
					    <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cant" required="required">
					</div>
					<div class="col-xs-1">
					    <input type="text" class="form-control" name="iva" id="iva" placeholder="IVA %" required="required">
					</div>
					<div class="col-xs-2">
					    <input type="text" class="form-control" name="total" id="total" placeholder="$+IVA" required="required">
					</div>
			        <div class="col-xs-2">
			        <input type="button" id="ok-btn" class="btn btn-primary" value="OK" onclick="nueva()" >
			        </div>

			        </form>
		
					<div id="listaarticulos">
			
						<h4 class="col-xs-12 session" id="resp" name="resp">
	      				</h4>


					</div>









		
		</div>	
		

		<?php } ?>

	
	

	<div id="footer">
      <div class="well">
        <p class="text-muted credit" style="text-align: center">GlobalCom © Copyright 2016 </p>
     	<p class="text-muted credit" style="text-align: center">25 de Mayo y Alberdi - Río Cuarto - Córdoba</p>
     	<p class="text-muted credit" style="text-align: center">0358 - 465-1236 | gc.globalcom@gmail.com </p>
      </div>
    </div>


</body>
</html>