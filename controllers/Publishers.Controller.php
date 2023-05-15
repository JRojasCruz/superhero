<?php

require_once '../model/Publishers.model.php';

if (isset($_POST['operacion'])){

  $publisher = new Publisher();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $publisher->listPublishers();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}