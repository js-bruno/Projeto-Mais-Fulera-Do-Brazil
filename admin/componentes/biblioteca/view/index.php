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
$sql = "SELECT count(*) as t FROM livros";
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
          <th>Cod</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Gênero</th>
          <th>Codigo do livro</th>
          <th>Em uso</th>
          <th> - </th>
        </tr>
      </thead>
      <tbody>
      <?php
       $sql = "SELECT * FROM livros";
       $sql = $pdo->query($sql);
       if($sql->rowCount() > 0){
         foreach($sql->fetchAll() as $livros):
          $sqlG = "SELECT nome_genero FROM genero WHERE cod_genero =".$livros['cod_genero'];
          $sqlG = $pdo->query($sqlG);
          $sqlG = $sqlG->fetch();
          
         ?>
      <tr>
        <td><?php print($livros['cod_livro']) ?></td>
        <td><?php print($livros['nome_livro']) ?></td>
        <td><?php print($livros['cod_autor']) ?></td>
        <td><?php print($sqlG['nome_genero']) ?></td> 
        <td><?php print($livros['status_livro']) ?></td>
        <td>
          <div class="switch">
            <label>
              Não
              <input type="checkbox">
              <span class="lever"></span>
              Sim
            </label>
          </div>
        </td>
        <td>
          <i class="fas fa-pen editar-livro"></i>
          <i class="fas fa-trash deletar-livro"></i>
        </td>
      </tr>
     <?php
      endforeach;
      }
    ?>
      </tbody>
    </table>
    <div class="lista-paginacao">
      <div class="item"><a href="#"><i class="fas fa-angle-left"></i></a></div>
      <div class="item"><span>01</span></div>
      <div class="item"><a href="#"><i class="fas fa-angle-right"></i></a></div>
    </div>
  </div>
</div>
  <div id="barraLateral">
    <div class="overlay"></div>
    <div class="novoLivro">
      <form>
          <h4>Novo livro</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text">
          <label>Nome</label>
          <input type="text">
          <label>Nome</label>
          <input type="text">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
    <div class="livroEdicao">
      <form>
          <h4>Editar livro</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text">
          <label>Nome</label>
          <input type="text">
          <label>Nome</label>
          <input type="text">
          <input type="submit" value="Atualizar">
        </div>
      </form>
    </div>
  </div>
