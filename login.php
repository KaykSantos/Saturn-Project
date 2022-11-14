<?php 
include('php/config.php');
if($_POST){
    if(empty($_POST['email']) || empty($_POST['password'])){
        $_SESSION['campo-vazio'] = true;
    }else{   
        $res = LoginUsuario($_POST['email'], $_POST['password'], "");
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
<body id="body-login">
    <nav id="nav-login">
        <p>Saturn</p>
        <div class="options-nav">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
        </div>
    </nav>
    <main id="main-login">
        <section id="section-login">
            <form method="post" autocomplete="off" id="form-login">
                <img src="imgs/saturn.jpg" width="110px">
                <p>Login</p>
                <input type="email" id="email" name="email" placeholder="Email" class="inputLogCad">
                <input type="password" id="password" name="password" placeholder="Senha" class="inputLogCad">
                <button name="login" id="btn-login">Enviar</button>
            </form>
        <?php
            if(isset($_SESSION['error-senha'])):
        ?>   
        <div id="error-senha">
            <p>Email e/ou senha inválidos!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['error-senha']);
        ?>
        <?php
            if(isset($_SESSION['user-bloq'])):
        ?>   
        <div id="user-bloq">
            <p>Usuário bloqueado, tente mais tarde!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['user-bloq']);
        ?>
        <?php
            if(isset($_SESSION['campo-vazio'])):
        ?>   
        <div id="user-bloq">
            <p>Preencha os campos de login!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['campo-vazio']);
        ?>
        <?php
            if(isset($_SESSION['cad-realizado'])):
        ?>   
        <div id="cad-realizado">
            <p>Cadastro realizado com sucesso! Faça login para entrar.</p>
        </div>
        <?php
            endif;
            unset($_SESSION['cad-realizado']);
        ?>
        </section>
    </main>
</body>
</html>