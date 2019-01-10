<?php session_start();?>
<html>
<head><title>GlobalCom</title></head>
<body>
<?php
/*
	mercadopago_ejemplo.php
	Ejemplo de información del pedido para mercadopago
	Fecha: 21/02/2012
	Autor: Mario Romero ( http://www.marioromero.com.ar)
	
	IMPORTANTE: Este script fue realizado con objetivos educativos bajo ambientes de prueba.
	No me responsabilizo por otros usos distintos del mismo. Gracias!
*/

require_once ('mercadopago.inc.php');

	//Actualizo campos del array
	$mercadopago['name'] = "GlobalCom";
	$mercadopago['price'] = $_SESSION['total'] ;
?>
	<b>Procesando el pedido... </b>
	<form action="<?=$mercadopago['url']?>" method="post" id='frmmercadopago' name='frmmercadopago' >
	<? echo imprimir_variables_ocultas($mercadopago);?>
	</form>

	<script language="JavaScript" type="text/javascript">
	window.onload=function() {
		window.document.frmmercadopago.submit();
	}
	</script>

</body>
</html>