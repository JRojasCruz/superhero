<?php
require "Conexion.php";
class Publisher extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listPublishers()
  {
    try {
      $consulta = $this->conexion->prepare("SELECT * FROM publisher");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}