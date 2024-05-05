<?php
    $dbHost='localhost';
    $dbUsername='root';
    $dbPassword='';
    $dbName='biblioteca';

    $conexao=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    //if($conexao->connect_errno){
    //    echo"Erro";
   // }else{
   //     echo"Conexao com sucesso";
   // }

?>