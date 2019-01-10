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

if (!isset($_REQUEST['enviar'])){
?>
	<form name="carga" method="post" action="">
	<p><b>Ingrese datos para enviar a Mercado Pago</b></p>
	<table border="0" cellspacing="0">
	<tr><td>Nombre del producto:</td><td><input type="text" size="20" maxlength="18" name="nombre"/></td></tr>
	<tr><td>Precio del producto:</td><td><input type="text" size="20" maxlength="18" name="precio"/></td></tr>
	</table>
	<input type="submit" name="enviar" value="Enviar">
	</form>

<?php
}
else
{
	//Actualizo campos del array
	if(isset($_REQUEST['nombre'])) $mercadopago['name'] = $_REQUEST['nombre'];
	if(isset($_REQUEST['precio'])) $mercadopago['price'] = $_REQUEST['precio'];
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

<?php 
}
?>
</body>
</html>