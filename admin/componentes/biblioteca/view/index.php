<?php
  $con = new PDO("mysql:host=localhost;dbname=biblioteca;charset=utf8", "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt=$con->prepare('SELECT count(cod_livro) from livros');
  
  
  
?>




<link rel="stylesheet" href="../../css/materialize.css">
<div id="painel-componentes-biblioteca" class="painel-componentes-biblioteca principal">
  <div class="resumo">
    <div class="total">
      <h4>Total</h4>
      <h5></h5>
      <i class="fas fa-chart-line"></i>
    </div>
      <div class="total">
        <h4>Total em uso</h4>
        <h5><?php 
            
            
        
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
          <th>Cod</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Categoria</th>
          <th>Codigo do livro</th>
          <th>Em uso</th>
          <th> - </th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td>01</td>
        <td>Edson Dantas</td>
        <td>sss</td>
        <td>Romance</td>
        <td>H34DTWASD009876</td>
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
