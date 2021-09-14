<?php
    require './acoes/conexao.php';

    /* INSERINDO OS DADOS VIA PDO */
    $id = filter_input(INPUT_POST,'id');
    $nomecompleto = filter_input(INPUT_POST,'nomecompleto');
    $datanasc = filter_input(INPUT_POST,'datanasc');
    $email = filter_input(INPUT_POST,'email');
    $cep = filter_input(INPUT_POST,'cep');
    $logradouro = filter_input(INPUT_POST,'logradouro');
    $uf = filter_input(INPUT_POST,'uf');
    $bairro = filter_input(INPUT_POST,'bairro');
    $cidade = filter_input(INPUT_POST,'cidade');
    $complemento = filter_input(INPUT_POST,'complemento');

    /* Verificar se os campos estão preenchidos*/
    if ($id && $nomecompleto && $datanasc && $email && $cep && $logradouro && $uf && $bairro && $cidade && $complemento) {

        $sql = $conexao->prepare("UPDATE clientes SET nomecompleto = :nomecompleto, datanasc = :datanasc, email = :email, cep = :cep, logradouro = :logradouro, uf = :uf, bairro = :bairro, cidade = :cidade, complemento = :complemento WHERE id = :id");
            $sql->bindValue(':nomecompleto', $nomecompleto);
            $sql->bindValue(':datanasc', $datanasc);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':cep', $cep);
            $sql->bindValue(':logradouro', $logradouro);
            $sql->bindValue(':uf', $uf);
            $sql->bindValue(':bairro', $bairro);
            $sql->bindValue(':cidade', $cidade);
            $sql->bindValue(':complemento', $complemento);
            $sql->bindValue(':id', $id);
            $sql->execute();
        
            header("Location: dashboard.php");
            exit;

    } else {
        header("Location: editar.php");
        exit;
    }

?>