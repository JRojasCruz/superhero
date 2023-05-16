<?php
require_once 'Conexion.php';

class FactionFilter extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listFaction($publisher_id)
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_listar_faction(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}