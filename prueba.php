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
<script>

$(function() {
  var availableTags = [
    "ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++",
    "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran",
    "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl",
    "PHP", "Python", "Ruby", "Scala", "Scheme"
  ];
  
  $(".autocomplete").autocomplete({
    source: availableTags
  });
});

$(function() {
            $("#descripcion").autocomplete({
                source: "acproductos.php",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
                    $('#codigo').val(ui.item.codigo);
          $('#descripcion').val(ui.item.descripcion);
          $('#precio').val(ui.item.precio);
          $('#id_producto').val(ui.item.id_producto);
           }
            });
    });
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
              <li class="active"><a href="factura.php">Facturacion</a></li>
              <li><a href="cliente.php">Clientes</a></li>
              <li><a href="articulo.php">Articulos</a></li>
              <li><a href="servicios2.php">Servicios</a></li>

            </ul>
            
          </div>
        
      
      </nav>
      </div>
      
  </header>


<div class="container">
    <div class="ui-widget">
  Codigo:  <input id="codigo">
  
  Precio: <input id="precio" readonly>
  <input type="hidden" id="id_producto">
  <p>Ingresa 00</p>
</div>

    <div class="row">

    <div class="col-md-2 column margintop20">
       <ul class="nav nav-pills nav-stacked">
      <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Lista de Comprobantes</a></li>
      <li class="active"><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Nueva</a></li>
      <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>Estadisticas</a></li>
      <li ><a href="factura.php"><span class="glyphicon glyphicon-chevron-right"></span>IVA Ventas</a></li>
    </ul>
    </div>
   
    <div class="row">

  <div class="form-group">
    <label class="control-label col-xs-3" >Razon Social/ Nombre:</label>
            <div class="col-xs-5">
    <input class="form-control" id="descripcion" placeholder="Enter A" />
    </div>
    <input type="button" id="cliente-btn" class="btn btn-primary" value="+" >
  </div>
  
  <div class="form-group">
    <label >Another Field</label>
    <input class="form-control">
  </div>
  </div>
   </div>
</div>
<div id="footer">
      <div class="well">
        <p class="text-muted credit" style="text-align: center">GlobalCom © Copyright 2016 </p>
      <p class="text-muted credit" style="text-align: center">25 de Mayo y Alberdi - Río Cuarto - Córdoba</p>
      <p class="text-muted credit" style="text-align: center">0358 - 465-1236 | gc.globalcom@gmail.com </p>
      </div>
    </div>


  <div class="ui-widget">
  Codigo:  <input id="codigo">
  producto: <input id="articulo">
  Precio: <input id="total" readonly>
  <input type="hidden" id="id_producto">
  <p>Ingresa 00</p>
</div>

</body>