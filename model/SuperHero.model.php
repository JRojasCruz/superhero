<?php
require "Conexion.php";

class SuperHero extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listSuperHero($publisher_id)
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_listar_superheros(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}