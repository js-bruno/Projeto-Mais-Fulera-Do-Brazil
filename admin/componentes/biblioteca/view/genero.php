<?php
// session_start();
// if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
// {
//   unset($_SESSION['login']);
//   unset($_SESSION['senha']);
//   header('location:index.php');
//   }
 
// $logado = $_SESSION['login'];
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
   
  </div>
  <div class="lista-container">
    <h2>Gêneros</h2>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Código do Gênero</th>
          <th></th>
          <th>Nome</th>
          <th></th>
          
          <th></th>
          <th>  </th>
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
        <td></td>
        <td><?php print($sqlA['cod_genero']) ?></td>
        <td></td>
        <td><?php print($sqlA['nome_genero']) ?></td> 
        <td>
         
        </td>
        <td></td>
        <td>
        <?php echo "<i class='fas fa-pen editar-livro'> </i> <a href=model.php?editarg=".$genero['cod_genero'].">  </a>"?>
          <?php echo "<a href=model.php?IIDG=".$genero['cod_genero']."> <i class='fas fa-trash deletar-genero'> </i>  </a>"?>

        </td>
      </tr>
     <?php
      endforeach;
      }
    ?>
      </tbody>
    </table>

  </div>
</div>
<div id="barraLateral">
    <div class="overlay"></div>
    <!-- Ajeitar Criar Livro -->
    <div class="novoLivro">
      <form method="post" action="model.php?genero=true">
          <h4>Novo Gênero</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text" name="nome_genero">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
    <!-- Ajeitar Editar Livro -->
    <div class="livroEdicao">
      <form method="post" action='model.php?edit="$genero[cod_genero"]'>
          <h4>Editar gênero</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label>Nome</label>
          <input type="text" name="edit_genero">
         
          <input type="submit" value="Atualizar">
        </div>
      </form>
    </div>
    <div class="alugarLivro">
      <form>
      <!-- Alugar -->
      <?php 
        $sql2 = "SELECT * from usuarios";
        $sql2 = $pdo->query($sql2);
        $usuarios = $sql2->fetchAll();
      ?>
          <h4>Alugar</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <select style="display: block;">
            <?php foreach($usuarios as $usuario){ ?>
                <option><?php print(($usuario['nome_usu']))?></option>
            <?php  }?>
          </select>


          <!-- Onde vai ficar os usuarios -->
          <input type="submit" value="Alugar">
        </div>
      </form>
    </div>
  </div>