<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.html'</script>";
    }
    
    $info = [];

    $id = filter_input(INPUT_GET, 'id');
    if($id) {
        $sql = $conexao->prepare("SELECT * FROM clientes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount()>0){
            $info = $sql->fetch( PDO::FETCH_ASSOC );

        } else {
            header("Location: editar.php");
            exit;
        }
    } else {
        header("Location: editar.php");
        exit;
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
    <title>Editar Cliente</title>
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

    <form method="POST" action="editar_action.php">
        <input type="hidden" name="id" value="<?=$info['id'];?>">

        <div>
        <label>Nome Completo</label>
        <input type="text" name="nomecompleto" value="<?=$info['nomecompleto'];?>" />
        </div>
        <div>
        <label>Data de Nascimento</label>
        <input type="date" name="datanasc" value="<?=$info['datanasc'];?>" />
        </div>
        <div>
        <label>Email</label>
        <input type="email" name="email" value="<?=$info['email'];?>" />
        </div>
        <div>
        <label>CEP</label>
        <input type="text" name="cep" value="<?=$info['cep'];?>" />
        </div>
        <div>
        <label>Logradouro</label>
        <input type="text" name="logradouro" value="<?=$info['logradouro'];?>" />
        </div>
        <div>
        <label>UF</label>
        <input type="text" name="uf" value="<?=$info['uf'];?>" />
        </div>
        <div>
        <label>Bairro</label>
        <input type="text" name="bairro" value="<?=$info['bairro'];?>" />
        </div>
        <div>
        <label>Cidade</label>
        <input type="text" name="cidade" value="<?=$info['cidade'];?>" />
        </div>
        <div>
        <label>Complemento</label>
        <input type="text" name="complemento" value="<?=$info['complemento'];?>" />
        </div>
        <input type="submit" value="Salvar" />
    </form>         
    <script src="app.js"></script>
</body>
</html>