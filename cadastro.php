<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.html'</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/navbar.css">
    <link rel="stylesheet" href="./style/cadastro.css">
    <title>Cadastro de Clientes</title>
</head>
<body>
<nav class="navbar">
        <div class="navbar_container">
         <div class="navbar_toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar_menu">
                <li class="navbar_item">
                    <a href="dashboard.php" class="navbar_links" id="home-page">Clientes</a>
                </li>
                <li class="navbar_item">
                    <a href="cadastro.php" class="navbar_links" id="home-page">Cadastro</a>
                </li>
                <li class="navbar_btn">
                    <a href="./acoes/logout.php" class="button" id="signup">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <form method="POST" action="cadastro_action.php">
     
        <label>Nome Completo</label>
        <input type="text" name="nomecompleto" />
     
    
        <label>Data de Nascimento</label>
        <input type="date" name="datanasc" />

        <label>Email</label>
        <input type="email" name="email" />
    

        <label>CEP</label>
        <input type="text" name="cep" />

        <label>Logradouro</label>
        <input type="text" name="logradouro" />


        <label>UF</label>
        <input type="text" name="uf" />


        <label>Bairro</label>
        <input type="text" name="bairro" />
 
     
        <label>Cidade</label>
        <input type="text" name="cidade" />
  

        <label>Complemento</label>
        <input type="text" name="complemento" />

        <input type="submit" value="Enviar" />
    </form>         
    <br/>
    <script src="app.js"></script>
</body>
</html>

<script>
    const $campoCep = document.querySelector('[name="cep"]');
    const $campoLogradouro = document.querySelector('[name="logradouro"]');
    const $campoUf = document.querySelector('[name="uf"]');
    const $campoBairro = document.querySelector('[name="bairro"]');
    const $campoCidade = document.querySelector('[name="cidade"]');

$campoCep.addEventListener("blur", infosDoEvento => {
    const cep = infosDoEvento.target.value;
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(respostaDoServer => {
            return respostaDoServer.json()
        })
        .then(dadosDoCep => {
            console.log(dadosDoCep);
            $campoLogradouro.value = dadosDoCep.logradouro;
            $campoUf.value = dadosDoCep.uf;
            $campoBairro.value = dadosDoCep.bairro;
            $campoCidade.value = dadosDoCep.localidade;
        });

});

</script>