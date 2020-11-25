<?php

function GetMessage($datoArregloKenobi,$datoArregloSkywalker,$datoArregloSato) {

// basandonos en el arreglo original se reposiciona por si la primer palabra de kenobi no es la primer palabra del
// mensaje, y se guarda en un nuevo arrebglo datoArregloSateliteModificado, para cada satelite
$terminar = 0;
$NuevoIndice = 50;
for ($i = 0; $i < 100; $i++) {
   if ($NuevoIndice <= 100):
   if ($datoArregloKenobi[$i] != "" or $NuevoIndice > 50):
   $datoArregloKenobiModificado[$NuevoIndice] = $datoArregloKenobi[$i];
//  echo "Kenobi Dato".$datoArregloKenobiModificado[$NuevoIndice];
   $NuevoIndice = $NuevoIndice + 1;
   endif;
endif;
}

// se busca coincidencia entre datos recibidos en kenobi con los recibidos en skywalker y se arma nuevo arreglo
// considerando las coincidencias.


for ($a = 50; $a < 100; $a++) {
   for ($b = 1; $b < 100; $b++) {
     if ( $datoArregloSkywalker[$b] != "" and $PrimerIndiceSkywalker == 0 ):
     $PrimeIndiceSkywalker = $b;
     endif;
     if ( $datoArregloSkywalker[$b] = $datoArregloKenobiModificado[$a] and $datoArregloSkywalker[$b] != "" ):
        $indiceTestigo = $a;
        $datoTestigo = $datoArregloSkywalker[$b];
        $terminar=1;      
endif;
     if ($terminar == 1):
         break 2;
     endif;
   }
}
$terminar=0;



// se registra el indice de coincidencia y el dato de coincidencia para reubicar el arreglo skywalker
// de no haber coincidencia SkywalkerMatch sigue en 0
if ($datoTestigo != "" ):

     $SkywalkerMatch == 1;
     for ($a = 1; $a < 100; $a++) {
        if ((($indiceTestigo - $b)+$a) <= 100 ):
          $datoArregloSkywalkerModificado[(($indiceTestigo - $b)+$a)] = $datoArregloSkywalker[$a];
        endif;
     }
endif;

$PrimerIndiceSato = 0;
$indiceTestigo = 0;
$datoTestigo = 0;

// ahora lo mismo pero kenobi/sato
for ($a = 50; $a < 100; $a++) {
   for ($b = 1; $b < 100; $b++) {
     if ( $datoArregloSato[$b] != "" and $PrimerIndiceSato == 0 ):
     $PrimeIndiceSato = $b;
     endif;
     if ( $datoArregloSato[$b] = $datoArregloKenobiModificado[$a] and $datoArregloSato[$b] != "" ):
     $indiceTestigo = $a;
     $datoTestigo = $datoArregloSato[$b];
        $terminar=1;      
endif;
     if ($terminar == 1):
         break 2;
     endif;
   }
}
$terminar=0;

if ($datoTestigo != "" ):
     $SatoMatch = 1;
     for ($a = 0; $a < 100; $a++) {
        if ((($indiceTestigo - $b)+$a) <= 100 ):
          $datoArregloSatoModificado[(($indiceTestigo - $b)+$a)] = $datoArregloSato[$a];
        endif;
     }
endif;

// cuando no coincide sato con kenobi se vincula con skywalker
if ($Skywalkermatch = 1 and $SatoMath == 0 ):

$PrimerIndiceSato = 0;
$indiceTestigo = 0;
$datoTestigo = 0;

for ($a = 50; $a < 100; $a++) {
   for ($b = 1; $b < 100; $b++) {
     if ( $datoArregloSato[$b] != "" and $PrimerIndiceSato == 0 ):
     $PrimeIndiceSato = $b;
     endif;
     if ( $datoArregloSato[$b] = $datoArregloSkywalkerModificado[$a] and $datoArregloSato[$b] != "" ):
     $indiceTestigo = $a;
     $datoTestigo = $datoArregloSato[$b];
        $terminar=1;      
endif;
     if ($terminar == 1):
         break 2;
     endif;
   }
}
$terminar=0;


if ($datoTestigo != "" ):
     $SatoMatch == 1;
     for ($a = 1; $a < 100; $a++) {
        if ((($indiceTestigo - $b)+$a) <= 100 ):
          $datoArregloSatoModificado[(($indiceTestigo - $b)+$a)] = $datoArregloSato[$a];
        endif;
     }
endif;
endif;

// cuando no coincide skywalker con kenobi se vincula con sato
if ($Skywalkermatch == 0 and $SatoMath == 1 ):

$PrimerIndiceSato = 0;
$indiceTestigo = 0;
$datoTestigo = 0;

for ($a = 1; $a < 100; $a++) {
   for ($b = 0; $b < 100; $b++) {
     if ( $datoArregloSkywalker[$b] != "" and $PrimerIndiceSkywalker == 0 ):
     $PrimeIndiceSato = $b;
     endif;
     if ( $datoArregloSkywalker[$b] = $datoArregloSatoModificado[$a] and $datoArregloSkywalker[$b] != "" ):
     $indiceTestigo = $a;
     $datoTestigo = $datoArregloSkywalker[$b];
        $terminar=1;      
endif;
     if ($terminar == 1):
         break 2;
     endif;
   }
}
$terminar=0;


if ($datoTestigo != "" ):
     $SkywalkerMatch == 1;
     for ($a = 1; $a < 100; $a++) {
        if ((($indiceTestigo - $b)+$a) <= 100 ):
          $datoArregloSkywalkerModificado[(($indiceTestigo - $b)+$a)] = $datoArregloSkywalker[$a];
        endif;
     }
endif;
endif;

// ahora se registran las posiciones iniciales y finales de los mensajes
$minimoKenobi = 0;
$minimoSkywalker = 0;
$minimoSato = 0;
$maximoKenobi = 0;
$maximoSkywalker = 0;
$maximoSato = 0;

for ($a = 1; $a < 100; $a++) {

    if ($datoArregloKenobiModificado[$a] != ""):
       if ($minimoKenobi == 0):
           $minimoKenobi = $a;
       endif;
        $maximoKenobi = $a;
    endif;

    if ($datoArregloSkywalkerModificado[$a] != ""):
       if ($minimoSkywalker == 0):
          $minimoSkywalker = $a;
       endif;
          $maximoSkywalker = $a;
    endif;
    if ($datoArregloSatoModificado[$a] != ""):
       if ($minimoSato == 0):
          $minimoSato = $a;
       endif;
          $maximoSato = $a;
    endif;



    $minimoMensaje = $minimoKenobi;
    if ( ($minimoSkywalker < $minimoMensaje) and ($minimoSkywalker != 0) ):
         $minimoMensaje = $minimoSkywalker;
    endif;
    if ( ($minimoSato < $minimoMensaje) and ($minimoSato != 0) ):
         $minimoMensaje = $minimoSato;
    endif;

    $maximoMensaje = $maximoKenobi;
    if ($maximoSkywalker > $maximoMensaje):
         $maximoMensaje = $maximoSkywalker;
    endif;
    if ($maximoSato > $maximoMensaje):
         $maximoMensaje = $maximoSato;
    endif;
}


    //Generacion de mensaje


    for ($a = $minimoMensaje; $a < ($maximoMensaje + 11); $a++) {
        If ($datoArregloKenobiModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloKenobiModificado[$a]." ";
        elseIf ($datoArregloSkywalkerModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloSkywalkerModificado[$a]." ";
        elseIf ($datoArregloSatoModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloSatoModificado[$a]." ";
        else:
             if ($SatoMatch == 0):
                if ($PrimerIndicevacio == 0):
                    $PrimerIndicevacio = $a;
                endif;
                $datoArregloSatoModificado[$a] = $datoArregloSato[($PrimerIndiceSato + ($a - $PrimerIndicevacio))];
             elseif ($Skywalkermatch == 0):
                if ($PrimerIndicevacio == 0):
                    $PrimerIndicevacio = $a;
                endif;
                $datoArregloSkywalkerModificado[$a] = $datoArregloSkywalker[($PrimerIndiceSkywalker + ($a - $PrimerIndicevacio))];
             endif;
             $mensaje = $mensaje." ' ' ";


        endif;
    }


// SegundaCarga esta carga es porque si no hay coincidencia de alguno de los satelites se llena los espacios vacios // y se vuelve a generar

$minimoKenobi = 0;
$minimoSkywalker = 0;
$minimoSato = 0;
$maximoKenobi = 0;
$maximoSkywalker = 0;
$maximoSato = 0;

for ($a = 0; $a < 100; $a++) {

    if ($datoArregloKenobiModificado[$a] != ""):
       if ($minimoKenobi == 0):
          $minimoKenobi = $a;
       endif;
          $maximoKenobi = $a;
    endif;
    if ($datoArregloSkywalkerModificado[$a] <> ""):
       if ($minimoSkywalker == 0):
          $minimoSkywalker = $a;
       endif;
          $maximoSkywalker = $a;
    endif;
    if ($datoArregloSatoModificado[$a] != ""):
       if ($minimoSato == 0):
          $minimoSato = $a;
       endif;
          $maximoSato = $a;
    endif;

    $minimoMensaje = $minimoKenobi;
    if ( ($minimoSkywalker < $minimoMensaje) and ($minimoSkywalker != 0) ):
         $minimoMensaje = $minimoSkywalker;
    endif;
    if ( ($minimoSato < $minimoMensaje) and ($minimoSato != 0) ):
         $minimoMensaje = $minimoSato;
    endif;

    $maximoMensaje = $maximoKenobi;
    if ($maximoSkywalker > $maximoMensaje):
         $maximoMensaje = $maximoSkywalker;
    endif;
    if ($maximoSato > $maximoMensaje):
         $maximoMensaje = $maximoSato;
    endif;
}

    //Generacion de mensaje
    $mensaje = "";




    for ($a = $minimoMensaje; $a < ($maximoMensaje + 10); $a++) {
        If ($datoArregloKenobiModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloKenobiModificado[$a]." ";
        elseIf ($datoArregloSkywalkerModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloSkywalkerModificado[$a]." ";
        elseIf ($datoArregloSatoModificado[$a] != ""):
            $mensaje = $mensaje.$datoArregloSatoModificado[$a]." ";
        endif;
    }


return $mensaje;


}

?>