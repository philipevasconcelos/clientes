<?php
    require("conexao.php");
    /*Verfica se o usário e senha digitados são de administrador, caso não ele permanece na mesma pagina*/
    if(isset($_POST["user"]) && isset($_POST["senha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE user = ? AND senha = ?");
        $query->execute(array($_POST["user"], $_POST["senha"]));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
//Após a verificação ele é direcionado para lista de clientes
            echo "<script>window.location = '../dashboard.php'</script>";
        }else{
            echo "<script>window.location = '../index.html'</script>";
        }
    }else{
        echo "<script>window.location = '../index.html'</script>";
    }
?>