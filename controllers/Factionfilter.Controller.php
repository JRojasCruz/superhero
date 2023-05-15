<?php

require_once '../model/Factionfilter.model.php';

if (isset($_POST['operacion'])){

  $faction = new Factionfilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $faction->listFaction();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}