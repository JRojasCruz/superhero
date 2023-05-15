<?php

require_once '../model/Publishers.model.php';

if (isset($_POST['operacion'])){

  $categoria = new Publisher();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $categoria->listPublishers();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}