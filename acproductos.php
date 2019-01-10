<?php
if (isset($_GET['term'])){
include("conexion.php");
$return_arr = array();
	$fetch = mysqli_query($conectado,"SELECT * FROM articulos where NombArti like '%" . mysqli_real_escape_string($conectado,($_GET['term'])) . "%'"); 
	


	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_producto=$row['CodiArti'];
		$precio=number_format($row['PreAArti'],2,".","");
		$iva=number_format($row['PreOArti'],2,".","");
		$row_array['value'] = $row['CodBArti']." | ".$row['NombArti'];
		$row_array['id_producto']=$row['CodiArti'];
		$row_array['codigo']=$row['CodBArti'];
		$row_array['descripcion']=$row['NombArti'];
		$row_array['precio']=$precio;
		$row_array['iva']=$iva;
		array_push($return_arr,$row_array);
    }

 
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
 
}
?>