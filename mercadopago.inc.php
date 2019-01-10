<?php session_start();?>
<?php
/*
	mercadopago.inc.php
	Variables necesarias para operar con Mercado Pago y funciones de ayuda
	Fecha: 21/02/2012
	Autor: Mario Romero ( http://www.marioromero.com.ar)
	
	IMPORTANTE: Este script fue realizado con objetivos educativos bajo ambientes de prueba.
	No me responsabilizo por otros usos distintos del mismo. Gracias!

	http://www.marioromero.com.ar/mercadopago/mercadopago_process.html

*/


$mercadopago = array();
$mercadopago['acc_id']      	= "532046382";		//buscar en el sitio de mercadopago https://www.mercadopago.com/mla/cartdata
$mercadopago['enc']     		= "tsF%2FivEUbhdptPjgdWUCLC0EZnY%3D"; 		//buscar en el sitio de mercadopago https://www.mercadopago.com/mla/cartdata
$mercadopago['name']   			= "GlobalCom";		//Nombre del artículo
$mercadopago['price']   		= $_SESSION['total'];		//Precio del artículo
$mercadopago['item_id']   		= "";		//id del artículo
$mercadopago['url_cancel']    	= "http://www.globalcom.com.ar/cancelado.php";
$mercadopago['url_process']		= "";
$mercadopago['url_succesfull']  = "http://www.globalcom.com.ar/satisfactorio.php"; 
$mercadopago['shipping_cost']   = "";		//Costo de envío.
$mercadopago['currency']      	= "ARS";	//Moneda

$mercadopago['url']           	= "https://www.mercadopago.com/mla/buybutton";

//Función que genera los campos html "hidden"
function imprimir_variables_ocultas($arr){
	$html = "";
	foreach ($arr as $clave => $valor){
		$html .= "\n"."<input type=\"hidden\" name=\"{$clave}\" value=\"{$valor}\"/>";
	}
	return $html;
}
?>
