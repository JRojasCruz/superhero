<?php
require "Conexion.php";
class Racefilter extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listRace()
  {
    try {
      $consulta = $this->conexion->prepare("SELECT * FROM race");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}