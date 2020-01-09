
<?php 

$pdo = new PDO('mysql:dbname=biblioteca;host=localhost', 'root', '');


  if(isset($_GET['cadastro'])){
 
    
    $stmt = $pdo  -> prepare('INSERT INTO livros (cod_livro, nome_livro, status_livro, cod_genero, cod_autor)  values (:cod_livro,:nome_livro,:status_livro,:cod_genero,:cod_autor)');
    $stmt->execute(array(
      ':cod_livro' => 0,
      ':nome_livro' => $_POST['nome_livro'],
      ':status_livro' => 0,
      ':cod_genero' => 6,
      ':cod_autor' => 3,
    
  
    ));



    header('location:index.php');
  }


  if(isset($_GET['autor'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO autores (cod_autor, nome_autor)  values (:cod_autor, :nome_autor)');
    $stmt->execute(array(
      ':cod_autor' => 0,
      ':nome_autor' => $_POST['nome_autor'],
   
    ));



    header('location:index.php');
  }

  if(isset($_GET['genero'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO genero (cod_genero, nome_genero)  values (:cod_genero, :nome_genero)');
    $stmt->execute(array(
      ':cod_genero' => 0,
      ':nome_genero' => $_POST['nome_genero'],
   
    ));



    header('location:index.php');
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
header('location:index.php');
}
if(isset($_GET['IIDG'])){
  $ID = $_GET['IIDG'];
  $stmt = $pdo  -> prepare('delete from genero where cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:index.php');
}

if(isset($_GET['IIDGG'])){
  $ID = $_GET['IIDGG'];
  $stmt = $pdo  -> prepare('UPDATE genero SET  nome_genero="'.$_POST['nome_genero'].'" WHERE cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
  $stmt->execute();
  header('location:index.php');
  }
   ?>

   


<?php 

$pdo = new PDO('mysql:dbname=biblioteca;host=localhost', 'root', '');


  if(isset($_GET['cadastro'])){
 
    
    $stmt = $pdo  -> prepare('INSERT INTO livros (cod_livro, nome_livro, status_livro, cod_genero, cod_autor)  values (:cod_livro,:nome_livro,:status_livro,:cod_genero,:cod_autor)');
    $stmt->execute(array(
      ':cod_livro' => 0,
      ':nome_livro' => $_POST['nome_livro'],
      ':status_livro' => 0,
      ':cod_genero' => 6,
      ':cod_autor' => 3,
    
  
    ));



    header('location:index.php');
  }


  if(isset($_GET['autor'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO autores (cod_autor, nome_autor)  values (:cod_autor, :nome_autor)');
    $stmt->execute(array(
      ':cod_autor' => 0,
      ':nome_autor' => $_POST['nome_autor'],
   
    ));



    header('location:index.php');
  }

  if(isset($_GET['genero'])){
 
    $stmt = $pdo  -> prepare('INSERT INTO genero (cod_genero, nome_genero)  values (:cod_genero, :nome_genero)');
    $stmt->execute(array(
      ':cod_genero' => 0,
      ':nome_genero' => $_POST['nome_genero'],
   
    ));



    header('location:index.php');
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
header('location:index.php');
}
if(isset($_GET['IIDG'])){
  $ID = $_GET['IIDG'];
  $stmt = $pdo  -> prepare('delete from genero where cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
$stmt->execute();
header('location:index.php');
}

if(isset($_GET['IIDGG'])){
  $ID = $_GET['IIDGG'];
  $stmt = $pdo  -> prepare('UPDATE genero SET  nome_genero="'.$_POST['nome_genero'].'" WHERE cod_genero = :ID');
  $stmt->bindParam(':ID', $ID); 
  $stmt->execute();
  header('location:index.php');
  }
   ?>

   


