<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<script type="text/javascript">
				  $(document).ready(function(){
				  	$("#resp").hide();
				  	$(".session").css('color','red');

				});

				   function iniciarsesion(){
				   	
				   			var email = $("#email").val();
				    	var password = $("#password").val();
				    	
				    	var dataString = 'email=' + email + '&password=' + password ;
				    $.ajax({
				      url:"iniciar.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				      	
				        if (respuesta == 1) {
				        	window.location.replace("factura.php");
				        	
				        } else {
							
				        	$("#resp").show();
				        $("#resp").html(respuesta);
				        
				        }
				      }
				    });

				    	

				  };

				</script>
</head>
<body>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<section>
			<div class="panel panel-default top caja">
			  <div class="panel-body">
			    <h3 class="text-center">Usuario Autorizado</h3>
			    
			    	<div class="input-group input-group-lg">
					  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					  <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					<div class="input-group input-group-lg">
					  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
					  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					 <button type="submit" class="btn btn-primary btn-block" onclick="iniciarsesion()">Ingresar</button>

			  
			  </div>
			</div>

		</section>
		<h4 id="resp" class="session">
		</h4>
		
	</div>