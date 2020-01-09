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
    <div class="total" style="height:50px">
      <h4>Total</h4>
      <h5>
        <?php 
          //Contagem de livros
          $sql = "SELECT count(*) as t FROM livros";
          $sql = $pdo->query($sql);
          $sql = $sql->fetch();
          $total = $sql['t'];
          echo $total;
        ?>
      
      
      </h5>
      <i class="fas fa-chart-line"></i>
    </div>
      <div class="total" style="height:50px">
        <h4>Total em uso</h4>

        <h5><?php 
        $sql = "SELECT count(*) as t FROM livros WHERE status_livro=1";
        $sql = $pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['t'];
        echo $total;
            
            
        ?></h5>
        <i class="fas fa-chart-bar"></i>
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
          <th>Codigo do livro</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Gênero</th>
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
          $sqlA = "SELECT nome_autor FROM autores WHERE cod_autor =".$livros['cod_autor'];
          $sqlA = $pdo->query($sqlA);
          $sqlG = $pdo->query($sqlG);
          $sqlA = $sqlA->fetch();
          $sqlG = $sqlG->fetch();
          
         ?>
      <tr>
        <td><?php print($livros['cod_livro']) ?></td>
        <td><?php print($livros['nome_livro']) ?></td>
        <td><?php print($sqlA['nome_autor']) ?></td>
        <td><?php print($sqlG['nome_genero']) ?></td> 
        <td>
          <div class="switch">
          <?php 
          if($livros['status_livro'] == 1){
           ?>
            <label>
            Não
              <input type="checkbox" checked>
              <span class="lever"></span>
            Sim
            </label>
          <?php 
          }else{
            ?>
             <label>
            Não
              <input type="checkbox">
              <span class="lever"></span>
            Sim
            </label>
            <?php 
          }
          ?>
          </div>
        </td>
        <td>
          <i class="fas fa-pen alugar-livro "href="" >ALUGAR</i>
          <i class="fas fa-pen editar-livro"></i>
          <?php echo "<a href=model.php?IID=".$livros['cod_livro']."> <i class='fas fa-trash deletar-livro'> </i>  </a>"?>
        </td>
      </tr>
     <?php
      endforeach;
      }
    ?>
      </tbody>
    </table>
    <!-- <div class="lista-paginacao">
      <div class="item"><a href="#"><i class="fas fa-angle-left"></i></a></div>
      <div class="item"><span>01</span></div>
      <div class="item"><a href="#"><i class="fas fa-angle-right"></i></a></div>
    </div> -->
  </div>
</div>
<div id="barraLateral">
    <div class="overlay"></div>
    <div class="novoLivro">
      <form method="post" action="model.php?cadastro=true">
          <h4>Novo livro</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text" name="nome_livro">
         <select>
<option>aaaa </option>
         </select>
          <?php
$sql = "SELECT cod_autor,nome_autor FROM autores";
$sql = $pdo->query($sql);
// $sql = $sql->fetch();
?>
           <label>Autor</label>
<select>
 <?php foreach($sql->fetchAll() as $autores): ?>
 <option value="<?php echo $autores['cod_autor'] ?>"><?php echo $autores['nome_autor'] ?></option>
 <?php
      endforeach;
      ?> 
 </select>

          
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

    <div class="alugarLivro">
      <form>
      <?php 

        $sql2 = "SELECT * from usuarios";
        $sql2 = $pdo->query($sql2);

      ?>
          <h4>Alugar</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Usuario</label>
          <input type="text">
          <!-- Onde vai ficar os usuarios -->
          <input type="submit" value="Atualizar">
        </div>
      </form>
    </div>
  </div>
    
 
  
  
