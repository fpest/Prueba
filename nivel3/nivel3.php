<?php

header('Content-Type: application/json');

$satellite_name = $_GET['satellite_name'];

$satellite_data = file_get_contents( 'php://input' );

$result = save_satellite_data($satellite_name, $satellite_data);

echo $result;
// Se verifica que los nombres de los satélites enviados coincidan con los tres dados.
function save_satellite_data($satellite_name, $satellite_data){
  if($satellite_name != "kenobi" and $satellite_name != "skywalker" and $satellite_name != "sato") {
    header('HTTP/1.1 400 Bad Request', true, 400);
    return json_encode(array('message' => "Nombre de satélite no reconocido."));
  }

  // Recibo las datos del satelite 
  $json_body = json_decode($satellite_data, true);
  $input_distance = $json_body["distance"];
  $input_message = $json_body["message"];

  // Se valida que se hayan enviado los datos necesarios
  if (empty($input_distance)) {
    header('HTTP/1.1 400 Bad Request', true, 400);
    return json_encode(array('message' => "El campo distancia en necesario."));
  }

  if (empty($input_message)) {
    header('HTTP/1.1 400 Bad Request', true, 400);
    return json_encode(array('message' => "El campo mensaje es necesario."));
  }

  // Se valida que la distancia ingresada sea realmente un número.
  if(is_numeric($input_distance) != 1){
    header('HTTP/1.1 400 Bad Request', true, 400);
    return json_encode(array('message' => "El dato distancia debe ser numérico."));
  }

  // se valida que el mensaje ingresado sea un array
  if(is_array($input_message) != TRUE) {
    header('HTTP/1.1 400 Bad Request', true, 400);
    return json_encode(array('message' => "El mensaje recibido no es válido."));
  }

  // se guarda el archivo del satellite en formato JSON
  $save_data = array('distance' => $input_distance, 'message' => $input_message);
  $file = fopen($satellite_name.'.json', 'w');
  fwrite($file, json_encode($save_data));
  fclose($file);

  header('HTTP/1.1 200 OK', true, 200);
  return json_encode(array('message' => "Los datos del satélite fueron registrados correctamente."));
}

?>