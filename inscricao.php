<?php
if(isset($_POST['submit'])){
  include_once('database.php');

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobre'];
  $email = $_POST['email']; 
  $senha = $_POST['senha'];
  $cep = $_POST['cep'];

  $result = mysqli_query($conexao, "INSERT INTO inscricao(nome, sobrenome, email, senha, cep) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$cep')");
   header("Location: perfil.html");
   exit();
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrição - FakeEtec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="stylesheet" href="estilos/style.css">
  </head>
  <body>
    <main>
        <div class="form">
            <div class="voltar">
                <a href="homepage.html">
                <span class="material-symbols-outlined">
                    arrow_back_ios
                </span>
                </a>
            </div>
            <form action="inscricao.php" method="post">
                <label for="inome" class="form-label">Nome</label>
                <input type="text" name="nome" id="inome" required class="form-control" maxlength="20" aria-label="Nome">

                <label for="isobre" class="form-label">Sobrenome</label>
                <input type="text" name="sobre" id="isobre" required class="form-control" maxlength="20" aria-label="Sobrenome">

                <label for="iemail" class="form-label">Email</label>
                <input type="email" name="email" id="iemail" required class="form-control" maxlength="50" aria-label="Email">

                <label for="isenha" class="form-label">Senha</label>
                <input type="password" name="senha" id="isenha" required class="form-control" maxlength="16" aria-label="Senha">

                <label for="icep" class="form-label">CEP</label>
                <input type="number" name="cep" id="icep" required class="form-control" minlength="9" maxlength="9" aria-label="CEP">

                <input type="submit" name="submit" value="Enviar" class="btn btn-primary" style="margin-top: 10px;">
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>