
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
          $sql = "SELECT count(*) as t FROM autores";
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
      <input placeholder="Procurar" type="search">
      <i class="fas fa-search"></i>
    </form>
  </div>
  <div class="lista-container">
    <h2>Biblioteca</h2>
    <table>
      <thead>
        <tr>
          <th>Codigo do Autor</th>
          <th>Nome</th>
          <th> - </th>
        </tr>
      </thead>
      <tbody>
      <?php
       $sql = "SELECT * FROM autores";
       $sql = $pdo->query($sql);
       if($sql->rowCount() > 0){
         foreach($sql->fetchAll() as $autores):
          $sqlA = "SELECT * FROM autores WHERE cod_autor =".$autores['cod_autor'];
          $sqlA = $pdo->query($sqlA);
          $sqlA = $sqlA->fetch();
          
         ?>
      <tr>
        <td><?php print($sqlA['cod_autor']) ?></td>
        <td><?php print($sqlA['nome_autor']) ?></td>
        <td>
          <i class="fas fa-pen editar-livro"></i>
          <?php echo "<a href=model.php?IIDA=".$autores['cod_autor']."> <i class='fas fa-trash deletar-autor'> </i>  </a>"?>
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
      <form method="post" action="model.php?autor=true">
          <h4>Novo Autor</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text" name="nome_autor">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
    <div class="livroEdicao">
      <form>
          <h4>Editar Autor</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text">
          <?php echo "<a href=model.php?IID=".$livros['cod_livro']." ><input type='submit' value='Atualizar'></a>" ?>
        </div>
      </form>
    </div>
  </div>
    
 
  
  
  