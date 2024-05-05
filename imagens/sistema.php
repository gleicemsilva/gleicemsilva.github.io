<?php
session_start();
include_once('config.php');
//print_r($_SESSION);
if((!isset($_SESSION['email'])==true)and(!isset($_SESSION['senha'])==true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location:login.php');

}    
    $logado = $_SESSION['email'];
    $sql = "SELECT * FROM livros ORDER BY id DESC";

    $result = $conexao->query($sql);
    //print_r($result);
    
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
    ;
    color: white;
    text-align: center;
  }

  .table-bg {
    background: rgba(0, 0, 0, 0.4);
    border-radius: 15px 15px 0 0;
  }
  </style>
</head>

<body>
  <h1>Bem-vindo ao Sistema de Cadastro de Livros</h1>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon">EXIT</span>
    </button>

    <div class="d-flex">
      <a href="sair.php" class="btn btn-danger">agora sair</a>

    </div>
  </nav>
  <button type="button" class="btn btn-primary">SAIR</button>


  <h2>Vamos Iniciar</h2>
  <br>

  <?php
    echo "<n1>Bem-vindo <u>$logado</u></h1>";
    
    ?>

  <div class="m-5">
    <table class="table text-white table-bg">
      <thead>
        <tr>
          <th scope="col">E-mail</th>
          <th scope="col">Senha</th>
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
          <th scope="col">...</th>
        </tr>
      </thead>
      <?php
        while($user_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['senha']."</td>";
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
                echo "<td>acoes</td>";
            }
        ?>
      </tbody>
    </table>
  </div>


</body>

</html>