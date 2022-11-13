<?php 
include('php/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saturn</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<body id="body-home">
    <nav id="nav-home">
        <p>Saturn</p>
        <div class="options-nav">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
        </div>
    </nav>
    <main id="main-home">
        <div id="card-home">
            
            <img src="imgs/saturn.jpg" width="110px">
            <h2>Saturn Project</h2>
            <p class="p-home">
            Olá, este é o Saturn Project, ele é constituído por um site e um aplicativo mobile. 
            Seu nome se é a versão em inglês de Saturno, o planeta.
            </p>
            <p class="p-home">
            Para realizar o download do aplicativo mobile do nosso projeto, clique no botão de 
            download e instale o app em seu celular (disponível apenas para dispositivos android).
            </p>
            <a href="imgs/icones/icon-download.png" download><button id="btn-download">Dowload <img src="imgs/icones/icon-download.png" width="20px" alt="Icone de download"></button></a>
        </div>
    </main>
</body>
</html>