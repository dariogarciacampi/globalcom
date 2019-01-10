<?php
$conectado = mysqli_connect("mysql.hostinger.com.ar","u338686486_globa","global305","u338686486_globu");

if (!$conectado) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>