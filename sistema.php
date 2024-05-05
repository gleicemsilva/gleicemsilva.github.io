<?php
session_start();
include_once('config.php');

if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit(); 
}

$logado = $_SESSION['email'];

// Verificar se o formulário de ordenação foi enviado
if(isset($_POST['ordenar_por'])) {
    $ordenar_por = $_POST['ordenar_por'];
    // Atualizar a consulta SQL com a opção de ordenação selecionada
    $sql = "SELECT * FROM livros ORDER BY $ordenar_por";
} else {
    // Consulta padrão: ordenar por ID em ordem decrescente
    $sql = "SELECT * FROM livros ORDER BY id DESC";
}

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISTEMA - BIBLIOTECA</title>
  <style>
  body {
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    background: linear-gradient(45deg, #4e54c8, #8f94fb);
    color: white;
    text-align: center;
  }

  .table-bg {
    background: rgba(0, 0, 0, 0.4);
    border-radius: 15px 15px 0 0;
  }

  .search-form {
    margin-bottom: 20px;
  }
  </style>
</head>

<body>
  <h1>Livros Cadastrados</h1>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"><a href="sair.php" class="btn btn-danger">SAIR</a></span>
    </button>


  </nav>
  <?php echo "<h4>Logado com o e-mail: <u>$logado</u></h4>"; ?>

  <!-- Formulário de busca -->
  <div class="search-form">
    <form action="buscar.php" method="GET">
      <label for="buscar">Buscar Livro:</label>
      <input type="text" id="buscar" name="buscar" placeholder="Digite o ISBN, título, autor, etc.">
      <button type="submit">Buscar</button>
    </form>
  </div>

  <!-- Formulário de ordenação -->
  <div class="order-form">
    <form action="" method="POST">
      <label for="ordenar_por">Ordenar por:</label>
      <select name="ordenar_por" id="ordenar_por">
        <option value="id DESC">Padrão</option>
        <option value="autor ASC">Autor (A-Z)</option>
        <option value="cadastrador ASC">Cadastrador (A-Z)</option>
        <option value="data_aquisicao DESC">Data de Aquisição (mais recente primeiro)</option>
        <option value="disponibilidade ASC">Status de Disponibilidade (A-Z)</option>
        <option value="edicao ASC">Edição (A-Z)</option>
        <option value="editora ASC">Editora (A-Z)</option>
        <option value="genero ASC">Gênero (A-Z)</option>
        <option value="idioma ASC">Idioma (A-Z)</option>
        <option value="paginas ASC">Número de Páginas (crescente)</option>
        <option value="titulo ASC">Título (A-Z)</option>
      </select>
      <button type="submit">Ordenar</button>
    </form>
  </div>

  <h1></h1>

  <div class="m-5">
    <table class="table text-white table-bg">
      <thead>
        <tr>
          <th scope="col">Cadastrador</th>
          <th scope="col">ISBN</th>
          <th scope="col">Título do Livro</th>
          <th scope="col">Autor(es)</th>
          <th scope="col">Editora</th>
          <th scope="col">Gênero</th>
          <th scope="col">Ano de Publicação</th>
          <th scope="col">Edição</th>
          <th scope="col">Idioma</th>
          <th scope="col">Número de Páginas</th>
          <th scope="col">Status de Disponibilidade</th>
          <th scope="col">Data de Aquisição</th>
          <th scope="col">Ação</th> <!-- Coluna para os botões de exclusão e edição -->
        </tr>
      </thead>
      <tbody>
        <?php
        while($user_data = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$user_data['cadastrador']."</td>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['titulo']."</td>";
            echo "<td>".$user_data['autor']."</td>";
            echo "<td>".$user_data['editora']."</td>";
            echo "<td>".$user_data['genero']."</td>";
            echo "<td>".$user_data['ano']."</td>";
            echo "<td>".$user_data['edicao']."</td>";
            echo "<td>".$user_data['idioma']."</td>";
            echo "<td>".$user_data['paginas']."</td>";
            echo "<td>".$user_data['disponibilidade']."</td>";
            echo "<td>".$user_data['data_aquisicao']."</td>";
            // Botões de exclusão e edição
            echo "<td>";
            echo "<button onclick=\"apagarDados(".$user_data['id'].")\">Excluir</button>";
            echo "<button onclick=\"editarDados(".$user_data['id'].")\">Editar</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
  function apagarDados(id) {
    const xh = new XMLHttpRequest();
    xh.open("POST", "delete.php");
    xh.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xh.send("id=" + id);
    xh.onload = function() {
      if (xh.status == 200) {
        location.reload();
      }
    }
  }

  function editarDados(id) {
    // Redirecionar para a página de edição com o ID do livro como parâmetro
    window.location.href = "editar.php?id=" + id;
  }
  </script>
</body>

</html>

<?php
$conexao->close();
?>