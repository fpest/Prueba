<?php

function GetLocation($d1,$d2,$d3) {

// se llevan las coordanadas de cada satelite considerando a kenobi en (0,0)
$x1 = -500 + 500;
$x2 = 100 + 500;
$x3 = 500 + 500;

$y1 = -200 + 200;
$y2 = -100 + 200;
$y3 = 100 + 200;

$A = ($x3 / $x2) * ($d1 ** 2 - $d2 ** 2 + $y2 ** 2) + $x3 * $x2 - $d1 ** 2 + $d3 ** 2 - $x3 ** 2 - $y3 ** 2;
$B = (2 * $x3 * $y2 / $x2) - (2 * $y3);

// se calcula (x0,y0) posicion de nave hasta ahora considerando a kenobi en (0,0)
$y0 = ($A / $B);
$x0 = ($d1 ** 2 - $d2 ** 2 + $x2 ** 2 + $y2 ** 2 - 2 * $y0 * $y2) / (2 * $x2);


// se calcula la posicion de la nave considerando a Kenobi en su posicion real
$y0 = $y0 - 200;
$x0 = $x0 - 500;

//Verificación
// para verificar si los datos de distancia y ubicación son coherentes si calculan las distancias a cada satélite
// considerando la ubicación calculada de la nave.

$x1 = -500;
$x2 = 100;
$x3 = 500;
$y1 = -200;
$y2 = -100;
$y3 = 100;

// para comparar los resultados se redondea tanto los datos obtenidos con los cálculos como así también los datos 
// entregados.

$verDs1 = ((($x0 - $x1)** 2 + ($y0 - $y1)**2)**(1/2));
$verDs2 = ((($x0 - $x2)** 2 + ($y0 - $y2)**2)**(1/2));
$verDs3 = ((($x0 - $x3)** 2 + ($y0 - $y3)**2)**(1/2));

$rd1 = round($d1);
$rverDs1 = round($verDs1);
$rd2 = round($d2);
$rverDs2 = round($verDs2);
$rd3 = round($d3);
$rverDs3 = round($verDs3);

// en la comparacion se contempla una tolerancia de un 1%.
if ((($rd1 + $rd1 / 100) > $rverDs1) and (($rd1 - $rd1 / 100) < $rverDs1) and (($rd2 + $rd2 / 100) > $rverDs2) and (($rd2 - $rd2 / 100) < $rverDs2) and (($rd3 + $rd3 / 100) > $rverDs3) and (($rd3 - $rd3 / 100) < $rverDs3)):
#echo "estoy en los iguales";
return array("x"=>$x0,"y"=>$y0);
else:
#echo "estoy en los distintos";
      return "La información brindada no es correcta.";
endif;

}

?>