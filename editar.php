<?php
include_once('config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
        // Processa os dados enviados pelo formulário
        $cadastrador = $_POST['cadastrador'];
        // $isbn = $_POST['id']; // Removido para evitar edição do ISBN
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

        // Atualiza os valores do livro no banco de dados com base nos dados enviados
        $sql = "UPDATE livros SET cadastrador='$cadastrador', titulo='$titulo', autor='$autor', editora='$editora', genero='$genero', ano='$ano', edicao='$edicao', idioma='$idioma', paginas='$paginas', disponibilidade='$disponibilidade', data_aquisicao='$data_aquisicao' WHERE id = '$id'";
        
        if($conexao->query($sql) === TRUE) {
            echo "Dados atualizados com sucesso.";
            // Redireciona o usuário de volta para a página de visualização de livros após a edição
            header('Location: sistema.php');
            exit();
        } else {
            echo "Erro ao atualizar os dados: " . $conexao->error;
        }
    } else {
        // Busca os dados do livro no banco de dados com base no ID fornecido
        $sql = "SELECT * FROM livros WHERE id = '$id'";
        $result = $conexao->query($sql);

        if($result->num_rows > 0) {
            $livro = $result->fetch_assoc();
        } else {
            echo "Livro não encontrado.";
            exit();
        }
    }
} else {
    echo "ID do livro não fornecido.";
    exit();
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Livro</title>
  <!-- Adicione quaisquer estilos ou scripts necessários aqui -->
</head>
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

<body>
  <!-- Formulário de edição -->
  <div class="container">
    <form action="editar.php?id=<?php echo $id; ?>" method="POST">
      <fieldset>
        <legend>Editar Dados</legend>

        <label for="cadastrador">Cadastrador:</label>
        <input type="text" name="cadastrador" id="cadastrador" value="<?php echo $livro['cadastrador']; ?>" required>

        <label for="id">ISBN:</label>
        <input type="text" name="id" id="id" value="<?php echo $livro['id']; ?>" disabled> <!-- Desabilitado para edição -->

        <!-- Mensagem informativa -->
        <p>O ISBN não pode ser alterado.</p>

        <label for="titulo">Título do Livro:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $livro['titulo']; ?>" required>

        <label for="autor">Autor(es):</label>
        <input type="text" name="autor" id="autor" value="<?php echo $livro['autor']; ?>" required>

        <label for="editora">Editora:</label>
        <input type="text" name="editora" id="editora" value="<?php echo $livro['editora']; ?>" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" value="<?php echo $livro['genero']; ?>" required>

        <label for="ano">Ano de Publicação:</label>
        <input type="number" name="ano" id="ano" value="<?php echo $livro['ano']; ?>" required>

        <label for="edicao">Edição:</label>
        <input type="text" name="edicao" id="edicao" value="<?php echo $livro['edicao']; ?>" required>

        <label for="idioma">Idioma:</label>
        <input type="text" name="idioma" id="idioma" value="<?php echo $livro['idioma']; ?>" required>

        <label for="paginas">Número de Páginas:</label>
        <input type="number" name="paginas" id="paginas" value="<?php echo $livro['paginas']; ?>" required>

        <label>Status de Disponibilidade para Empréstimo:</label>
        <div>
          <input type="radio" id="disponivel" name="disponibilidade" value="disponivel" <?php if ($livro['disponibilidade'] == 'disponivel') echo "checked"; ?> required>
          <label for="disponivel">Disponível</label>
        </div>
        <div>
          <input type="radio" id="indisponivel" name="disponibilidade" value="indisponivel" <?php if ($livro['disponibilidade'] == 'indisponivel') echo "checked"; ?> required>
          <label for="indisponivel">Indisponível</label>
        </div>
        <br>
        <label for="data_aquisicao">Data de Aquisição:</label>
        <input type="date" name="data_aquisicao" id="data_aquisicao" value="<?php echo $livro['data_aquisicao']; ?>" required>

        <input type="submit" name="submit" value="Salvar Alterações">
      </fieldset>
    </form>
  </div>
</body>

</html>