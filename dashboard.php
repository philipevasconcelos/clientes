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

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/navbar.css">
    <link rel="stylesheet" href="./style/clientlist.css">
    <title>Lista de Clientes</title>
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
    
        <?php if($adm): ?>
        <div class="table1">
            <table>
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Email</th>
                        <th>Cep</th>
                        <th>Logradouro</th>
                        <th>UF</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Complemento</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php
                        $query = $conexao->prepare("SELECT * FROM clientes");
                        $query->execute();
                
                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($users); $i++):
                            $usuarioAtual = $users[$i];
                    ?>
                    <tr>
                        <td><?php echo $usuarioAtual['nomecompleto']; ?></td>
                        <td><?php echo $usuarioAtual['datanasc']; ?></td>
                        <td><?php echo $usuarioAtual['email']; ?></td>
                        <td><?php echo $usuarioAtual['cep']; ?></td>
                        <td><?php echo $usuarioAtual['logradouro']; ?></td>
                        <td><?php echo $usuarioAtual['uf']; ?></td>
                        <td><?php echo $usuarioAtual['bairro']; ?></td>
                        <td><?php echo $usuarioAtual['cidade']; ?></td>
                        <td><?php echo $usuarioAtual['complemento']; ?></td>
                        <td>
                        <a href="editar.php?id=<?=$usuarioAtual['id'];?>">Editar</a>
                        <a href="excluir.php?id=<?=$usuarioAtual['id'];?>" onclick="return confirm('Tem certeza que deseja excluir')">Excluir</a>
                    </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>            
            </table>
        </div>
        <?php endif; ?>
        <script src="app.js"></script>
    </body>
</html>