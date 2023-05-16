<?php
require_once '../model/Faction.model.php';
require_once '../model/Gender.model.php';
require_once '../model/Race.model.php';

function renderJSON($object = []){
  if($object){
    echo json_encode($object);
  }
}
if(isset($_POST['operacion'])){
  switch($_POST['operacion']){
    case 'listFaction':
      $alignment = new Faction();
      renderJSON($alignment->listFaction());
      break;
    case 'listGender':
      $alignment = new Gender();
      renderJSON($alignment->listGender());
      break;
    case 'listRace':
        $alignment = new Race();
        renderJSON($alignment->listRace());
        break;
  }
}