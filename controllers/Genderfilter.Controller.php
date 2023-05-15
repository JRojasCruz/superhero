<?php

require_once '../model/Genderfilter.model.php';

if (isset($_POST['operacion'])){

  $gender = new Genderfilter();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $gender->listGender();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


}