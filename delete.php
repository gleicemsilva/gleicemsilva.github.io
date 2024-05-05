<?php
include_once('config.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query para excluir o registro com o ID fornecido
    $sql = "DELETE FROM livros WHERE id = '$id'";
    
    if($conexao->query($sql) === TRUE) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . $conexao->error;
    }
} else {
    echo "ID do livro não fornecido.";
}

$conexao->close();
?>