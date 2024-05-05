<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Cadastro de Livros</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
  }

  header {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 2px 0;
    margin-bottom: 30px;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  h1 {
    margin-bottom: 20px;
  }

  h2 {
    color: white
  }

  p {
    margin-bottom: 30px;
    font-size: 18px;
  }

  .container {
    text-align: center;
    color: white
  }

  .box {
    background-color: rgba(255, 255, 255, 0.8);
    /* Fundo branco com transparência */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    display: inline-block;
    /* Adicionado para ajustar a largura ao conteúdo interno */
  }

  .box a {
    text-decoration: none;
    display: inline-block;
    margin: 0 10px;
    padding: 15px 30px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
    font-weight: bold;
    font-size: 16px;
  }

  .box a.login {
    color: #333;
    background-color: #ffc107;
    /* Amarelo para o botão "LIVROS CADASTRADOS" */
    border: 2px solid #ffc107;
  }

  .box a.cadastrar {
    color: #fff;
    background-color: #007bff;
    /* Azul para o botão "CADASTRAR" */
    border: 2px solid #007bff;
  }

  .box a:hover {
    background-color: #333;
    /* Cor de fundo mais escura ao passar o mouse */
    color: #fff;
    /* Cor do texto mais clara ao passar o mouse */
  }

  footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
  }

  footer p {
    margin: 0;
  }
  </style>
</head>

<body>
  <img src="fundo4.jpg" alt="Imagem de Fundo" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; object-fit: cover;">
  <header>
    <h1>Sistema de Cadastro de Livros</h1>
  </header>
  <div class="container">
    <h1>Bem-vindo!</h1>
    <h2>
      Com nosso sistema você poderá adicionar novos títulos à sua biblioteca de forma rápida e organizada.</h2>
    <div class="box">
      <a class="login" href="login.php">LIVROS CADASTRADOS</a>
      <a class="cadastrar" href="formulario2.php">CADASTRAR</a>
    </div>
  </div>
  <marquee behavior="scroll" direction="left" scrollamount="20">
    <img src="imagens/imagem.png" alt="Imagem 1" width="200" height="150">
    <img src="imagens/imagem3.jpg" alt="Imagem 3" width="200" height="150">
    <img src="imagens/imagem4.jpg" alt="Imagem 4" width="200" height="150">
    <img src="imagens/imagem5.jpg" alt="Imagem 5" width="200" height="150">
    <img src="imagens/imagem.png" alt="Imagem 1" width="200" height="150">
    <img src="imagens/imagem3.jpg" alt="Imagem 3" width="200" height="150">
    <img src="imagens/imagem4.jpg" alt="Imagem 4" width="200" height="150">
    <img src="imagens/imagem5.jpg" alt="Imagem 5" width="200" height="150">
  </marquee>
  <footer>
    <p>Aluna: Gleiceanne Silva</p>
  </footer>

</body>

</html>