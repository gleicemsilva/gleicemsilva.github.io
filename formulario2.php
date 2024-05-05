<?php

if(isset($_POST['submit']))
{
    include_once('config.php');//chamar a conexao
    
    $cadastrador = $_POST['cadastrador'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $edicao = $_POST['edicao'];
    $idioma = $_POST['idioma'];
    $paginas = $_POST['paginas'];
    $disponibilidade = $_POST['disponibilidade'];
    $data_aquisicao = $_POST['data_aquisicao'];

    // Verificar se o ISBN já existe no banco de dados
    $query = mysqli_query($conexao, "SELECT * FROM livros WHERE id = '$id'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        // ISBN já existe, exibir alerta
        echo "<script>alert('ISBN já existe. Por favor, escolha outro ISBN.');</script>";
    } else {
        // ISBN não existe, realizar a inserção no banco de dados
        $result = mysqli_query($conexao, "INSERT INTO livros(cadastrador,email,senha,id,titulo,autor,editora,genero,ano,edicao,idioma,paginas,disponibilidade,data_aquisicao) VALUES ('$cadastrador','$email','$senha','$id','$titulo','$autor','$editora','$genero','$ano','$edicao','$idioma','$paginas','$disponibilidade','$data_aquisicao')");
        header('Location:sucesso.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(45deg, #4e54c8, #8f94fb);
    color: #333;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: #007bff;
  }

  form {
    margin-top: 20px;
  }

  fieldset {
    border: 2px solid #007bff;
    border-radius: 10px;
    padding: 20px;
  }

  legend {
    color: #007bff;
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
  }

  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="number"],
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }
  </style>
</head>

<body>
  <a href="home.php">Voltar</a>
  <div class="container">
    <h1>Fórmulario de Cadastro</h1>
    <form action="formulario2.php" method="POST">
      <fieldset>
        <legend>Dados</legend>

        <label for="cadastrador">Cadastrador:</label>
        <input type="text" name="cadastrador" id="cadastrador" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <label for="id">ISBN:</label>
        <input type="text" name="id" id="id" required>

        <label for="titulo">Título do Livro:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="autor">Autor(es):</label>
        <input type="text" name="autor" id="autor" required>

        <label for="editora">Editora:</label>
        <input type="text" name="editora" id="editora" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" required>

        <label for="ano">Ano de Publicação:</label>
        <input type="number" name="ano" id="ano" required>

        <label for="edicao">Edição:</label>
        <input type="text" name="edicao" id="edicao" required>

        <label for="idioma">Idioma:</label>
        <input type="text" name="idioma" id="idioma" required>

        <label for="paginas">Número de Páginas:</label>
        <input type="number" name="paginas" id="paginas" required>

        <label>Status de Disponibilidade para Empréstimo:</label>
        <div>
          <input type="radio" id="disponivel" name="disponibilidade" value="disponivel" required>
          <label for="disponivel">Disponível</label>
        </div>
        <div>
          <input type="radio" id="indisponivel" name="disponibilidade" value="indisponivel" required>
          <label for="outro">Indisponível</label>
        </div>
        <br>
        <label for="data_aquisicao">Data de Aquisição:</label>
        <input type="date" name="data_aquisicao" id="data_aquisicao" required>

        <input type="submit" name="submit" value="Cadastrar">
      </fieldset>
    </form>
  </div>
</body>

</html>