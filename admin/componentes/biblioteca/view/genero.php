
<?php
try {
    $pdo = new PDO("mysql:dbname=biblioteca;host=localhost", "root", "");
    
  } catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit; 
  }
  
  
  ?>


  


<link rel="stylesheet" href="../../css/materialize.css">
<div id="painel-componentes-biblioteca" class="painel-componentes-biblioteca principal">
  <div class="resumo">
    <div class="total">
      <h4>Total</h4>
      <h5>
       <?php 
      $sql = "SELECT count(*) as t FROM genero";
      $sql = $pdo->query($sql);
      $sql = $sql->fetch();
      $total = $sql['t'];
      echo $total;
?>
        </h5>
     
      <i class="fas fa-chart-line"></i>
    </div>
      <button><i class="fas fa-plus"></i> Adicionar</button>
    <form>
      <input placeholder="Procurar por nome" type="search" name="pesquisa">
      <i class="fas fa-search"></i>
    </form>
  </div>
  <div class="lista-container">
    <h2>Biblioteca</h2>
    <table>
      <thead>
        <tr>
          <th>Codigo do Gênero</th>
          <th>Nome</th>
          <th> - </th>
        </tr>
      </thead>
      <tbody>
      <?php
       $sql = "SELECT * FROM genero";
       $sql = $pdo->query($sql);
       if($sql->rowCount() > 0){
         foreach($sql->fetchAll() as $genero):
          $sqlA = "SELECT * FROM genero WHERE cod_genero =".$genero['cod_genero'];
          $sqlA = $pdo->query($sqlA);
          $sqlA = $sqlA->fetch();
          
         ?>
      <tr>
        <td><?php print($sqlA['cod_genero']) ?></td>
        <td><?php print($sqlA['nome_genero']) ?></td>
        <td>
          <?php echo "<i class='fas fa-pen editar-livro'> </i> <a href=model.php?IIDGG=".$genero['cod_genero'].">  </a>"?>
          <?php echo "<a href=model.php?IIDG=".$genero['cod_genero']."> <i class='fas fa-trash deletar-genero'> </i>  </a>"?>
        </td>
      </tr>
     <?php
      endforeach;
      }
    ?>
      </tbody>
    </table>
   
<div id="barraLateral">
    <div class="overlay"></div>
    <div class="novoLivro">
      <form method="post" >
          <h4>Novo Gênero</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text" >
          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
    <div class="livroEdicao">
      <form method='post' action='model.php'> 
          <h4>Editar genero</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text"  name="nome_genero">
          <input type='submit' value='Atualizar'>
        </div>
      </form>
    </div>
  </div>
    
 
  
  
  