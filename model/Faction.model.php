<?php
require_once 'Conexion.php';

class Faction extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listFaction()
  {
    try {
      $consulta = $this->conexion->prepare("SELECT * FROM alignment");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}