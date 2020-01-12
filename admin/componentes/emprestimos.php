<html lang="pt">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="../../css/style.css">
      
      <!-- <link rel="stylesheet" href="../../materialize.css"> -->
    <title>Biblioteca Adelino</title>
  </head>
  <body>
    <header>
      <div class="menu-superior">
        <ul>
          <li><i title="Sair" class="fas fa-sign-out-alt"></i></li>
          <!-- <li><i class="fas fa-user"></i></li> -->
        </ul>
      </div>
      <nav class="active">
        <div class="abrir-menu"><i class="fas fa-angle-double-right active"></i></div>
        <div class="mini-menu-lateral">
          <ul>
            <li><i class="fas fa-user"></i></li>
            <li><i class="far fa-question-circle"></i></li>
            <li><i class="fas fa-cog"></i></li>
          </ul>
        </div>
        <div class="sub-menu-editar">
          <div class="editar-content">
            <div class="header-editar">
              <h6>Editar Conta</h6>
              <i class="fas fa-times"></i>
            </div>
              <p>informações da conta</p>
            <form>
              <label>Nome</label>
              <input type="text" required>
              <label>Email</label>
              <input type="email" required>
              <label>Senha</label>
              <input type="password" required>
              <button><i class="fas fa-save"></i> Salvar</button>
            </form>
          </div>
        </div>
        <div class="menu-lateral active">
          <div class="manu-lateral-content">
            <div class="menu-dados">
                <h6>Seja bem-vindo </h6><i class="fas fa-pen"></i>
              
            </div>
            <div class="menu-acessos">
                <h6>Acessos</h6>
                <ul>
                <li><i class="fas fa-book-open"></i><a href="index.php">Livros</a></li>
                  <li><i class="fas fa-bookmark"></i><a href="genero.php">Gêneros</a></li>
                  <li><i class="fas fa-book-reader"></i><a href="autores.php">Autores</a></li>
                  <li><i class="fas fa-users"></i></i><a href="alunos.php">Alunos</a></li>
                  <li><i class="fas fa-list-alt"></i></i><a href="emprestimos.php">Empréstimos</a></li>

                </ul>
            </div>
          </div>
        </div>
      </nav>
      <main>
      </main>
    </header>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/materialize.js"></script>
    <script src="https://kit.fontawesome.com/f9150985e5.js" crossorigin="anonymous"></script>
    <script src="../../js/app.js" charset="utf-8"></script>
    <script src="./biblioteca/js/app.js"></script>            
    <script>
      function carregarInicio(){
        $("main").load("./biblioteca/view/emprestimos.php");
      }
      carregarInicio();
      listarResumoAcessorios();
      $(document).on("click", ".menu-superior ul li i", () => {
        window.location.href = "./sair.php";
      })
    </script>
  </body>
</html>
