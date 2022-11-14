<?php 
include('php/config.php');
if($_POST){
    if(empty($_POST['nome']) || empty($_POST['email'] || empty($_POST['password']))){
        $_SESSION['campo-vazio'] = true;
    }else{   
        CadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['password']);
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
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<body id="body-cad">
    <nav id="nav-cad">
        <p>Saturn</p>
        <div class="options-cad">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
        </div>
    </nav>
    <main id="main-cad">
        <section id="section-cad">
            <form method="post" autocomplete="off" id="form-cad">
                <img src="imgs/saturn.jpg" width="110px">
                <p>Cadastro</p>
                <input type="text" id="nome" name="nome" placeholder="Nome" class="inputLogCad">
                <input type="email" id="email" name="email" placeholder="Email" class="inputLogCad">
                <input type="password" id="password" name="password" placeholder="Senha" class="inputLogCad">
                <button name="cadastrar" id="btn-cad">Cadastrar</button>
            </form>
            <?php
                if(isset($_SESSION['error-cad'])):
            ?>   
            <div id="error-cad">
                <p>Erro ao realizar cadastro! Tente novamente.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['error-cad']);
            ?>
            <?php
                if(isset($_SESSION['campo-vazio'])):
            ?>   
            <div id="user-bloq">
                <p>Preencha os campos de cadastro!</p>
            </div>
            <?php
                endif;
                unset($_SESSION['campo-vazio']);
            ?>
        </section>
    </main>
</body>
</html>