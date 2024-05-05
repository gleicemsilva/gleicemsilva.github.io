<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro realizado com sucesso</title>
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
    color: white
  }

  .container {
    text-align: center;
    color: white
  }

  .box {
    background-color: rgba(0, 0, 0, 0.8);
    /* Cor de fundo preta com transparência */
    color: white;
    /* Texto branco */
    padding: 20px;
    /* Menos espaço de preenchimento */
    border-radius: 8px;
    /* Menor raio do border-radius */
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    /* Sombra mais suave */
    display: inline-block;
  }

  /* Adicionado para ajustar a largura ao conteúdo interno */







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

    <div class="box">

      <p>Seu livro foi cadastrado com sucesso. Obrigado!</p>
    </div>
  </div>
  <br><br><br>
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

  <script>
  // Função para redirecionar após 3 segundos
  setTimeout(function() {
    window.location.href = "home.php"; // Altere "home.php" para a página para onde você deseja redirecionar
  }, 5000); // 5000 milissegundos = 5 segundos
  </script>

  <footer>
    <p>Aluna: Gleiceanne Silva</p>
  </footer>
</body>

</html>