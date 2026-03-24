<?php

$host = 'localhost'; 
$port = '5432'; 
$dbname = 'tienda'; 
$user = 'postgres'; 
$password = '2003'; 

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $user, $password);//PDO esun objeto que hace referencia a  la conexion con la base de datos (php data object)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
     
    echo  $e->getMessage();
}
?>
