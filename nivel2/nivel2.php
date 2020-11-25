<?php
  
header('Content-Type: application/json');

include 'location.php';
include 'message.php';


$string = file_get_contents( 'php://input' );

$array = json_decode($string,true);

$array = $array["satellites"];

$d1 = $array[0][distance];
$d2 = $array[1][distance];
$d3 = $array[2][distance];

// En los arreglos se guardan las palabras y espacios recibidos por cada satélite.
for ($i = 1; $i < 100; $i++) {
$datoArregloKenobi[$i] = $array[0][message][$i-1];
$datoArregloSkywalker[$i] = $array[1][message][$i-1];
$datoArregloSato[$i] = $array[2][message][$i-1];
}

// Se ejecutan para calcularla las coordenadas de la nave y descifrar el mensaje.
$mensajefinal = GetMessage($datoArregloKenobi,$datoArregloSkywalker,$datoArregloSato);
$posicionfinal = GetLocation($d1,$d2,$d3);

$response = array('possition'=>$posicionfinal,'message'=>$mensajefinal);
echo json_encode($response);

  ?>