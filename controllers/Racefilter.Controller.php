<?php

require_once '../model/Racefilter.model.php';

if (isset($_POST['operacion'])){

  $race = new Racefilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $race->listRace();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}