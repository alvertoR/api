<?php
include_once 'conexion.php';

$peticion = $_GET['variable'];


//para que firefox detecte que nuestros datos de php estan siendo envidados en formato Json
header('Content-Type: application/json');

//para que todo mundo pueda acceder a nuestra api atra vez de la url
//si que remos que solo sea nuestro dominio el que consuma la apu, cambiamos el "*" por nuestro dominio
header("Access-Control-Allow-Origin: *");

if($peticion == 'peliculas' || $peticion == 'empleados'){
    

    $conexion = new Conexion();

    $query = $conexion->connect()->query("Select * from $peticion");

    $datos = $query->fetchAll();

}else{
    echo "solicitud no encontrada";
}

echo json_encode($datos);



?>