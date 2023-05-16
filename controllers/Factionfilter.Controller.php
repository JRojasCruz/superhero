<?php

require_once '../model/FactionFilter.model.php';

if (isset($_POST['operacion'])){

  $faction = new FactionFilter();

  if ($_POST['operacion'] == 'listar'){
    $datos = $faction->listFaction($_POST['publisher_id']);
    if ($datos){
      echo json_encode($datos);
    }
  }


}