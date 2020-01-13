<?php
include "../config/Conexao.php";
include "../model/usuarios.php";
session_start();
if (isset($_POST["ACAO"])) {
 if (isset($_POST["login"]) && isset( $_POST["senha"]) && $_POST["ACAO"] == "EFETUAR LOGIN") {
   if (!empty($_POST["login"]) && !empty($_POST["senha"])) {
     $usuarios = new USUARIOS();
     $usu_login = $_POST["login"];
     $usu_senha = $_POST["senha"];
     $usuarios->setUsu_login($usu_login);
     $usuarios->setUsu_senha($usu_senha);
     $retorno = $usuarios->Login();
     echo json_encode($retorno);
   }else{
    $retorno = array("status" => 3, "mensagem" => "Verifque se os campos não estão vazios");
    echo json_encode($retorno);
   }
 }else{
    $retorno = array("status" => 2, "mensagem" => "Verifque os parâmetros enviados");
    echo json_encode($retorno);
 }
}else{
  $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
  echo json_encode($retorno);
}