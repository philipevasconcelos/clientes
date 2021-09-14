<?php
    require './acoes/conexao.php';

    // Obtendo informações das variaveis externas e filtrando
    $nomecompleto = filter_input(INPUT_POST,'nomecompleto');
    $datanasc = filter_input(INPUT_POST,'datanasc');
    $email = filter_input(INPUT_POST,'email');
    $cep = filter_input(INPUT_POST,'cep');
    $logradouro = filter_input(INPUT_POST,'logradouro');
    $uf = filter_input(INPUT_POST,'uf');
    $bairro = filter_input(INPUT_POST,'bairro');
    $cidade = filter_input(INPUT_POST,'cidade');
    $complemento = filter_input(INPUT_POST,'complemento');
    
    //Verifica cada campo se está preenchido no momento do envio
    if ($nomecompleto && $datanasc && $email && $cep && $logradouro && $uf && $bairro && $cidade && $complemento) {
        
        //Inserindo os dados na tabela
        $sql = $conexao->prepare("INSERT INTO clientes (nomecompleto, datanasc, email, cep, logradouro, uf, bairro, cidade, complemento) VALUES (:nomecompleto, :datanasc, :email, :cep, :logradouro, :uf, :bairro, :cidade, :complemento)");
            $sql->bindValue(':nomecompleto', $nomecompleto);
            $sql->bindValue(':datanasc', $datanasc);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':cep', $cep);
            $sql->bindValue(':logradouro', $logradouro);
            $sql->bindValue(':uf', $uf);
            $sql->bindValue(':bairro', $bairro);
            $sql->bindValue(':cidade', $cidade);
            $sql->bindValue(':complemento', $complemento);
            $sql->execute();
        //Validando assim os dados, direciona para a lista de clientes
            header("Location: dashboard.php");
            exit;
        //Não validando permanece no cadastro 
    } else {
        header("Location: cadastro.php");
        exit;
    }

?>