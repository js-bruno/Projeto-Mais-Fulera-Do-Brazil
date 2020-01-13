<?php
try {
    $pdo = new PDO("mysql:dbname=biblioteca;host=localhost", "root", "");
}catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit; 
  }

if(isset($_POST['login'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM login where login_nome = '".$login."' AND login_senha='".$senha."'";
    $sql = $pdo->query($sql);
    $sql = $sql->fetchAll();
    
    

    if(isset($sql[0]['cod'])){
        header('location:admin/componentes');
    }else{
        header('location:./index.php');
    }
    }


// $result = mysql_query("SELECT * FROM login 
// WHERE login_nome = $login AND login_senha= $senha");

// if(mysql_num_rows ($result) > 0 )
// {
//     $_SESSION['login'] = $login;
//     $_SESSION['senha'] = $senha;
//     header('location:./biblioteca/view/index.php');
// }
// else{
?>