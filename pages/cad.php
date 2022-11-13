<?php 
include('php/config.php');
if($_POST){
    if(empty($_POST['nome']) || empty($_POST['email'] || empty($_POST['password']))){
        $_SESSION['campo-vazio'] = true;
    }else if(isset($_POST['cad-emp'])){   
        CadastrarEmpresa($_POST['nome'], $_POST['descricao']);
    }else if(isset($_POST['ent-emp'])){
        EntrarEmpresa($_POST['id']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Saturn</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
</head>
<body id="body-cad">
    <nav id="nav-cad">
        <p>Eta Carinae</p>
        <a href="atividades.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
    </nav>
    <main id="main-cad">
        <section id="section-cad">
            <form method="post" autocomplete="off" id="form-cad">
                <?php
                    if($_GET){
                        if($_GET['criar']){
                            echo '
                            <p>Cadastrar empresa</p>
                            <input type="text" id="nome" name="nome" placeholder="Nome" class="inputLogCad">
                            <textarea name="descricao" class="inputLogCad" style="resize:none;height:60px;margin-top:20px;" cols="40" placeholder="Descrição"></textarea>
                            <button name="cad-emp">Cadastrar</button>
                            ';
                        }else if($_GET['entrar']){
                            echo '
                            <p>Entrar em uma empresa</p>
                            <input type="text" id="id" name="id" placeholder="Id de compartilhamento" class="inputLogCad">
                            <button name="ent-emp">Entrar</button>
                            ';
                        }
                    }
                ?>
                
            </form>
        </section>
    </main>
</body>
</html>