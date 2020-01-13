
<?php 

$pdo = new PDO('mysql:dbname=biblioteca;host=localhost', 'root', '');

  if(isset($_GET['cadastro'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO livros (cod_livro, nome_livro, status_livro, cod_genero, cod_autor)  values (:cod_livro,:nome_livro,:status_livro,:cod_genero,:cod_autor)');
    $stmt->execute(array(
      ':cod_livro' => 0,
      ':nome_livro' => $_POST['nome_livro'],
      ':status_livro' => 0,
      ':cod_genero' => $_POST['cod_genero'],
      ':cod_autor' => $_POST['cod_autor'],
  
    ));

    header('location:index.php');
  }

  if(isset($_GET['cadaluno'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO usuarios (cod_usu, nome_usu, curso_usu)  values (:cod_usu,:nome_usu,:curso_usu)');
    $stmt->execute(array(
      ':cod_usu' => 0,
      ':nome_usu' => $_POST['nome_usu'],
      ':curso_usu' => $_POST['curso'],
  
    ));

    header('location:alunos.php');
  }

  if(isset($_GET['autor'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO autores (cod_autor, nome_autor)  values (:cod_autor, :nome_autor)');
    $stmt->execute(array(
      ':cod_autor' => 0,
      ':nome_autor' => $_POST['nome_autor'],
   
    ));



    header('location:autores.php');
  }

  if(isset($_GET['genero'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO genero (cod_genero, nome_genero)  values (:cod_genero, :nome_genero)');
    $stmt->execute(array(
      ':cod_genero' => 0,
      ':nome_genero' => $_POST['nome_genero'],
   
    ));



    header('location:genero.php');
  }
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $stmt = $pdo  -> prepare('UPDATE genero SET  nome_genero="'.$_POST['nome_genero'].'" WHERE cod_genero = :edit');
    $stmt->execute(array(
      ':edit' => $id,
      ':cod_genero' => 0,
      ':nome_genero' => $_POST['nome_genero'],
   
    ));



    header('location:genero.php');
  }

  if(isset($_GET['IID'])){
    $ID = $_GET['IID'];
    $stmt = $pdo  -> prepare('delete from livros where cod_livro = :ID');
    $stmt->bindParam(':ID', $ID); 
  $stmt->execute();
	header('location:index.php');
}
if(isset($_GET['IIDA'])){
  $ID = $_GET['IIDA'];
  $stmt = $pdo  -> prepare('delete from autores where cod_autor = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:autores.php');
}

if(isset($_GET['IIDU'])){
  $ID = $_GET['IIDU'];
  $stmt = $pdo  -> prepare('delete from usuarios where cod_usu = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:alunos.php');
}

if(isset($_GET['IIDE'])){
  $ID = $_GET['IIDE'];
  $stmt = $pdo  -> prepare('delete from alugar where cod_emp = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:emprestimos.php');
}

if(isset($_GET['IIDG'])){
  $ID = $_GET['IIDG'];
  $stmt = $pdo  -> prepare('delete from genero where cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:genero.php');
}

if(isset($_GET['IIDGG'])){
  $ID = $_GET['IIDGG'];
  $stmt = $pdo  -> prepare('UPDATE genero SET  nome_genero="'.$_POST['nome_genero'].'" WHERE cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
  $stmt->execute();
  header('location:index.php');
  }

  if(isset($_GET['alugar'])){
    
    $stmt = $pdo -> prepare('INSERT INTO alugar (cod_emp, cod_livro, cod_usu)  VALUES (:cod_emp, :cod_livro, :cod_usu)');
    $stmt->execute(array(
      ':cod_emp' => 0,
      ':cod_livro' => $_POST['selectL'],
      ':cod_usu' => $_POST['selectU'],
  
    ));
    $sqlL = 'UPDATE livros SET status_livro=1 WHERE cod_livro='.$_POST['selectL'];
    $sqlL = $pdo->query($sqlL);
    header('location:emprestimos.php');
    
  }
  
   ?>
<?php 

  // if(isset($_GET['cadastro'])){
 
    
  //   $stmt = $pdo  -> prepare('INSERT INTO livros (cod_livro, nome_livro, status_livro, cod_genero, cod_autor)  values (:cod_livro,:nome_livro,:status_livro,:cod_genero,:cod_autor)');
  //   $stmt->execute(array(
  //     ':cod_livro' => 0,
  //     ':nome_livro' => $_POST['nome_livro'],
  //     ':status_livro' => 0,
  //     ':cod_genero' => 6,
  //     ':cod_autor' => 3,
    
  
  //   ));



  //   header('location:index.php');
  // }


  // if(isset($_GET['autor'])){
 
  //   $stmt = $pdo  -> prepare('INSERT INTO autores (cod_autor, nome_autor)  values (:cod_autor, :nome_autor)');
  //   $stmt->execute(array(
  //     ':cod_autor' => 0,
  //     ':nome_autor' => $_POST['nome_autor'],
   
  //   ));



  //   header('location:index.php');
  // }

  // if(isset($_GET['genero'])){
 
  //   $stmt = $pdo  -> prepare('INSERT INTO genero (cod_genero, nome_genero)  values (:cod_genero, :nome_genero)');
  //   $stmt->execute(array(
  //     ':cod_genero' => 0,
  //     ':nome_genero' => $_POST['nome_genero'],
   
  //   ));



  //   header('location:index.php');
  // }

//   if(isset($_GET['IID'])){
//     $ID = $_GET['IID'];
//     $stmt = $pdo  -> prepare('delete from livros where cod_livro = :ID');
//     $stmt->bindParam(':ID', $ID); 
//   $stmt->execute();
// 	header('location:index.php');
// }
// if(isset($_GET['IIDA'])){
//   $ID = $_GET['IIDA'];
//   $stmt = $pdo  -> prepare('delete from autores where cod_autor = :ID');
//   $stmt->bindParam(':ID', $ID); 
// $stmt->execute();
// header('location:index.php');
// }
// if(isset($_GET['IIDG'])){
//   $ID = $_GET['IIDG'];
//   $stmt = $pdo  -> prepare('delete from genero where cod_genero = :ID');
//   $stmt->bindParam(':ID', $ID); 
// $stmt->execute();
// header('location:genero.php');
// }

// if(isset($_GET['IIDGG'])){
//   $ID = $_GET['IIDGG'];
//   $stmt = $pdo  -> prepare('UPDATE genero SET  nome_genero="'.$_POST['nome_genero'].'" WHERE cod_genero = :ID');
//   $stmt->bindParam(':ID', $ID); 
//   $stmt->execute();
//   header('location:genero.php');
//   };
// ?>
