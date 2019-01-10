
<?php session_start();

						include("conexion.php");
		            			$fecha = date("Y-m-d") ;
		            			$codigo = $_POST["codigo"];
		            			$articulo = $_POST["articulo"];
		            			$cantidad = $_POST["cantidad"];
		            			$iva = $_POST["iva"];
		            			$total = $_POST["total"];
		            			$codigou = $_SESSION["codigou"];
		            			

		            			$neto = $total/($iva/100+1);
		            			if ($iva == 21) {
		            				$ivanum21 = $total - $neto ;
		            				$ivanum21 = $ivanum21 * $cantidad;
		            				$tneto21 = $neto * $cantidad;
		            			}else{
		            				$ivanum10 = $total - $neto ;
		            				$ivanum10 = $ivanum10 * $cantidad;
		            				$tneto10 =  $neto * $cantidad;
		            			}
		            			
		            			$total = $total * $cantidad ;
		            			$neto = $neto * $cantidad;
		            			$ivanum = $total - $neto;
		            			$estadofact = "Nueva" ;

		            			$result = mysqli_query($conectado,"SELECT CodiFact, Net21Fact, Net10Fact, Iva21Fact, Iva10Fact, TotaFact from factura WHERE CodiUsua = '".$codigou."' AND EstaFact = '".$estadofact."' ");
		            	if(mysqli_num_rows($result) <= 0){
								    	mysqli_query($conectado,"INSERT INTO factura (CodiUsua, FechFact, Net21Fact, Net10Fact, Iva21Fact, Iva10Fact, TotaFact, EstaFact) values ('".$codigou."','".$fecha."','".$tneto21."', '".$tneto10."','".$ivanum21."','".$ivanum10."','".$total."', '".$estadofact."')");

								    	$result = mysqli_query($conectado,"SELECT CodiFact, Net21Fact, Net10Fact, Iva21Fact, Iva10Fact, TotaFact from factura WHERE CodiUsua = '".$codigou."' AND EstaFact = '".$estadofact."' ");

								    	$datoarray = mysqli_fetch_array($result);
								    	$codifactura = $datoarray["CodiFact"];

								    	mysqli_query($conectado,"INSERT INTO artifact (CodiFact, NombArti, CantArti, NetoArFa, IvaArFa, TotaArFa) values ('".$codifactura."','".$articulo."','".$cantidad."','".$neto."', '".$ivanum."','".$total."')");


								    } else{

								    $datoarray = mysqli_fetch_array($result);
								    	$codifactura = $datoarray["CodiFact"];
								    	$ttneto21 = $datoarray["Net21Fact"];
								    	$ttneto10 = $datoarray["Net10Fact"];
								    	$tivanum21 = $datoarray["Iva21Fact"];
								    	$tivanum10 = $datoarray["Iva10Fact"];
								    	$ttotal = $datoarray["TotaFact"];

								    	mysqli_query($conectado,"INSERT INTO artifact (CodiFact, NombArti, CantArti, NetoArFa, IvaArFa, TotaArFa) values ('".$codifactura."','".$articulo."','".$cantidad."','".$neto."', '".$ivanum."','".$total."')");

								    	$ttotal = $ttotal + $total ;
								    	$ttneto21 = $ttneto21 + $tneto21;
								    	$ttneto10 = $ttneto10 + $tneto10;
								    	$tivanum21 = $tivanum21 + $ivanum21;
								    	$tivanum10 = $tivanum10 + $ivanum10;

								    	mysqli_query($conectado,"UPDATE factura SET Net21Fact = '".$ttneto21."', Net10Fact = '".$ttneto10."',Iva21Fact = '".$tivanum21."',Iva10Fact = '".$tivanum10."',TotaFact = '".$ttotal."' WHERE CodiFact = '".$codifactura."'");

								    	}	

		            				
/*

								    $calcular =  mysqli_query($conectado,"SELECT TotaUsPr,CantUsPr FROM usuaprod WHERE CodiPedi = '".$cpedi."'");
								    	 while ($calculo = mysqli_fetch_array($calcular))
						  						{
						  							$total = $calculo["TotaUsPr"] * $calculo["CantUsPr"]; 
						  							$totalped = $totalped + $total;
						  						}
						  			mysqli_query($conectado,"UPDATE pedido SET TTotPedi = '".$totalped."' WHERE CodiPedi = '".$cpedi."'");		
						  			
							    } else {

							    	$codigop = $_GET["id"];
								    $articulo =  mysqli_query($conectado,"SELECT PrecProd FROM producto WHERE CoddProd = '".$codigop."'");
								    $product = mysqli_fetch_array($articulo);
								    $precio = $product["PrecProd"];


							    	mysqli_query($conectado,"INSERT INTO pedido (CodiUsua, TIvaPedi, TTotPedi, EstaPedi, FechPedi) values ('".$idu."', '0','".$precio."','Pendiente','".$fecha."')");

							    	$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
							    	$pedido = mysqli_fetch_array($carrito);

								    $cpedi = $pedido ["CodiPedi"];
								   
								    mysqli_query($conectado,"INSERT INTO usuaprod (CodiPedi, CodiProdu, IvaUsPr, TotaUsPr, CantUsPr) values ('".$cpedi."','".$codigop."', '0', '".$precio."','".$cantidad."')");
									
									$calcular =  mysqli_query($conectado,"SELECT TotaUsPr FROM usuaprod WHERE CodiPedi = '".$cpedi."'");
								    	 while ($calculo = mysqli_fetch_array($calcular))
						  						{
						  							$total = $calculo["TotaUsPr"] * $calculo["CantUsPr"]; 
						  							$totalped = $totalped + $total;
						  						}
						  			mysqli_query($conectado,"UPDATE pedido SET TTotPedi = '".$totalped."' WHERE CodiPedi = '".$cpedi."'");	

							    }  */
?>