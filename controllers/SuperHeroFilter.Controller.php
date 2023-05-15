<?php

require_once '../model/SuperHeroFilter.model.php';

if (isset($_POST['operacion'])){

  $superherofilter = new SuperHeroFilter();

  if ($_POST['operacion'] == 'listar'){
    $datos = $superherofilter->listSuperHero($_POST['race_id'],$_POST['gender_id'],$_POST['alignment_id']);
    if ($datos){
      echo json_encode($datos);
    }
  }


}