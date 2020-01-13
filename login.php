<?php 
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$con = mysql_connect("127.0.0.1", "root", "") or die
 ("Sem conexão com o servidor!");
$select = mysql_select_db("biblioteca") or die("Sem acesso ao banco de dados, entre em 
contato com o Administrador.");

$result = mysql_query("SELECT * FROM login 
WHERE login_nome =$login AND login_senha= $senha");

if(mysql_num_rows ($result) > 0 )
{
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:./biblioteca/view/index.php');
}
else{
  alert("Login ou senha incorretos!");
   
  }
?>