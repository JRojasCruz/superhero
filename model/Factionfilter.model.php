<?php
require "Conexion.php";
class Factionfilter extends Conexion{
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
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}