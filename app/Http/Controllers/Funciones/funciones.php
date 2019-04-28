<?php

function GeneraCuenta ($sexo, $documento)
{
   if($sexo == '1'){
      $cuenta = '21'.$documento;
   }
   else{
      $cuenta = '23'.$documento;
   }

   return $cuenta;
}

?>