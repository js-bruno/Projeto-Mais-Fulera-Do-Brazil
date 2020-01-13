<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/f9150985e5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  <div id="login-container">
    <div class="login">
      <form method="POST" action="login.php" id="formlogin" name="formlogin">
        <div class="indeterminate"></div>
        <h2>Entrar</h2>
        <i class="fas fa-book-reader"></i>
        <label>Login</label>
        <input type="text" name="login" id="login" placeholder="Login" required>
        <label>Senha</label>
        <input id="pass" type="password" name="senha" id="senha" placeholder="Sua senha" required><i class="fas fa-eye"></i>
        <input type="submit" value="entrar" id="entrar">
      </form>
    </div>
  </div>
  <footer>
    <div class="rodape">
      <p>e.e.e.p professor cesar campelo - 2019</p>
      <p>Suporte <i class="fas fa-headset"></i></p>
    </div>
  </footer>
  <script src="js/jquery.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/login.js"></script>
</body>
</html>