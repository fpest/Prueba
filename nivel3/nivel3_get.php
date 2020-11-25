<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include 'location.php';
include 'message.php';

header('Content-Type: application/json');

// se revisa que todos los archivos de datos de satellites existan
if (file_exists('kenobi.json') and file_exists('skywalker.json') and file_exists('sato.json')) {
  $data_kenobi = json_decode(file_get_contents("kenobi.json"), true);
  $data_skywalker = json_decode(file_get_contents("skywalker.json"), true);
  $data_sato = json_decode(file_get_contents("sato.json"), true);

  $d1 = $data_kenobi['distance'];
  $d2 = $data_skywalker['distance'];
  $d3 = $data_sato['distance'];

  for ($i = 1; $i < 100; $i++) {
    $datoArregloKenobi[$i] = $data_kenobi['message'][$i-1];
    $datoArregloSkywalker[$i] =$data_skywalker['message'][$i-1];
    $datoArregloSato[$i] = $data_sato['message'][$i-1];
  }

 $mensajefinal = GetMessage($datoArregloKenobi,$datoArregloSkywalker,$datoArregloSato);
 $posicionfinal = GetLocation($d1,$d2,$d3);

  $response = array('position' => $posicionfinal,'message' => $mensajefinal);
  header('HTTP/1.1 200 OK', true, 200);
  echo json_encode($response);
} else {
  header('HTTP/1.1 200 OK', true, 200);
  echo json_encode(array('message' => "No hay suficiente información para determinar posición."));
}

?>