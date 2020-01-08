<?php 
class Conexao{
  public function abrirConexao(){
    try {
      $con = new PDO("mysqli:host=localhost;dbname=biblioteca;charset=utf8", "root", "");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $con; 
    } catch (PDOException $e) {
      echo "Error ao se conectar".$e->getMessage();
    }
  }
}