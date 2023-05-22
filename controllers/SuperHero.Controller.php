<?php

require_once '../model/SuperHero.model.php';

if (isset($_POST['operacion'])){

  $superhero = new SuperHero();

  if ($_POST['operacion'] == 'listar'){
    $datos = $superhero->listSuperHero($_POST['publisher_id']);
    if ($datos){
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'graficar'){
    $datos = $superhero->graphicSuperHero();
    if ($datos){
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'eyecolour'){
    $datos = $superhero->listEyeColour();
    if ($datos){
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'factionidpublisher'){
    $datos = $superhero->listFactionPulisherId();
    if ($datos){
      echo json_encode($datos);
    }
  }
}