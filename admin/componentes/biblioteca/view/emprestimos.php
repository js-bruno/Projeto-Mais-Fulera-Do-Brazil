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
        <h4>Total alugados</h4>

        <h5><?php 
        $sql = "SELECT count(*) as t FROM alugar";
        $sql = $pdo->query($sql);
        $sql = $sql->fetch();
        $total = $sql['t'];
        echo $total;
            
            
        ?></h5>
        <i class="fas fa-chart-bar"></i>
      </div>
      <button><i class="fas fa-plus"></i> Alugar</button>
      <form method='post' action="emprestimos.php">
      <div class="conteudo-form">
      <input type='search' placeholder='Pesquisar' name='pesquisa' >
      </div>
      </form>
  </div>
  
  <div class="lista-container">
    <h2>Empréstimos</h2>
    <table>
      <thead>
        <tr>
          <th>Codigo de Empréstimo</th>
          <th></th>
          <th>Nome do Usuário</th>
          <th>Livro</th>
          <th>Prazo</th>
          <th>opçoes</th>
        </tr>
      </thead>
      <tbody>
      <?php
       $sql = "SELECT * FROM alugar";
       $sql = $pdo->query($sql);
      
       if($sql->rowCount() > 0){
         foreach($sql->fetchAll() as $livros):
          // $sqlG = "SELECT nome_livro FROM livros WHERE cod_livro =".$livros['cod_livro'];
          // $sqlG = $pdo->query($sqlG);
          // $sqlG = $sqlG->fetch();
          $sqlUsu = "SELECT * from usuarios where cod_usu =".$livros['cod_usu'];
          $sqlUsu = $pdo->query($sqlUsu);
          $sqlUsu = $sqlUsu->fetch();
          $nome_usu = $sqlUsu['nome_usu'];
          
          $sqlLiv = "SELECT * from livros where cod_livro=".$livros['cod_livro'];
          $sqlLiv = $pdo->query($sqlLiv);
          $sqlLiv = $sqlLiv->fetch();
          $nome_liv = $sqlLiv['nome_livro'];
         ?>
      <tr>
        <td><?php print($livros['cod_emp']) ?></td>
        <td></td>
        <td><?php print($nome_usu)?></td>
        <td><?php print($nome_liv)?></td>
        <td><?php  ?></td>

        <td>
          <i class="fas fa-check" style="color:#618a74"></i>
          <i class="fas fa-pen editar-livro"></i>
          <?php echo "<a href=model.php?IIDE=".$livros['cod_emp']."> <i class='fas fa-trash deletar-livro'> </i>  </a>"?>
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
      <form method="post" >
          <div class="conteudo-form">
          <?php 
        $sql2 = "SELECT * from usuarios";
        $sql3 = "SELECT * from livros WHERE status_livro=0";
        $sql2 = $pdo->query($sql2);
        $sql3 = $pdo->query($sql3);
        $usuarios = $sql2->fetchAll();
        $livros = $sql3->fetchAll();

      ?>
          <h4>Alugar</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label >Usuário</label>
          <select style="display: block;" >
            <?php foreach($usuarios as $usuario){ ?>
                <option ><?php print($usuario['nome_usu'])?></option>
            <?php  }?>
          </select>
          <label >Livro</label>
          <select style="display: block;">
            <?php foreach($livros as $livro){ ?>
                <option ><?php print($livro['nome_livro'])?></option>
            <?php  }?>
          </select>

          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
    <!-- Ajeitar Editar Livro -->
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
      <form method='post' action='model.php?alugar=true'>
      <!-- Alugar -->
      <?php 
        $sql2 = "SELECT * from usuarios";
        $sql3 = "SELECT * from livros WHERE status_livro=0";
        $sql2 = $pdo->query($sql2);
        $sql3 = $pdo->query($sql3);
        $usuarios = $sql2->fetchAll();
        $livros = $sql3->fetchAll();

      ?>
      >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
          <h4>Alugar</h4><i class="fas fa-times"></i>
          <div class="conteudo-form">
          <label >Usuário</label>
          <select style="display: block;" name='selectU'>
          <option>Selecione </option>
            <?php foreach($usuarios as $usuario){ ?>
                <option value="<?php echo $usuario['cod_usu'] ?>"><?php print($usuario['nome_usu'])?></option>
            <?php  }?>
          </select>
          <br>
          <label >Livro</label>
          <select style="display: block;" name='selectL'>
          <option>Selecione </option>

            <?php foreach($livros as $livro){ ?>

                <option value="<?php echo $livro['cod_livro'] ?>"><?php print($livro['nome_livro'])?></option>
            <?php  }?>
          </select>


          <!-- Onde vai ficar os usuarios -->
          <input type="submit" value="Alugar">
        </div>
      </form>
    </div>
  </div>