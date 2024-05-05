<?php
session_start();

    // print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['email'])&& !empty($_POST['senha']))
{
// acessa o sitema
include_once('config.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

// print_r('email' .$email);
// print_r('<br>');
// print_r('senha' .$senha);

$sql = "SELECT * FROM livros WHERE email= '$email' and senha= '$senha'";

$result = $conexao->query($sql);

// print_r($sql);
// print_r($result);
if(mysqli_num_rows($result)<1){
    // print_r('Não entrou no sistema');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
else{
    // print_r('Entrou no Sistema');
    $_SESSION['email']=$email;
    $_SESSION['senha']=$senha;
    header('Location: sistema.php');
}



}
else
{
    // nao acessa o sitema
    header('Location: login.php');
}
?>