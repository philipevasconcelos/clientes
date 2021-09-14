<?php

    require './acoes/conexao.php';

$id = filter_input(INPUT_GET, 'id');
if($id) {
   
    $sql = $conexao->prepare("DELETE clientes WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
} 
    header("Location: dashboard.php");
    exit;

?>