
<?php
require_once "config/conexionbbdd.php";
require_once "models/querys.php";
require_once __DIR__ . '/vendor/autoload.php';


$objetoQuerys = new QueryModel($pdo);
$fideosResults= $objetoQuerys->fideos18();

//carga de plantillas
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/views'); 

//motor twig
$twig = new \Twig\Environment($loader);

echo $twig->render('fideos.html.twig',  [ 
    'clientes' => $fideosResults
]);
?>
