<?php
include('../php/config.php');
if(!isset($_SESSION['cdUser'])){
    header('Location: ../index.php');
}
if($_POST){
    if(isset($_POST['sair'])){
        header('Location: ../index.php');
        Sair();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Eta Carinae</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />-->
    <style>
        @charset "UTF-8";
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        #body-conta{
            font-family: 'Work Sans', sans-serif;
            background-color: #bfddf8;
            margin: 0px;
            padding: 0px;
        }
        #main-conta{
            display: flex;
            flex-direction: column;
            margin-left: auto;
            margin-right: auto;
            justify-content: center;
            align-items: center;
        }
        .tituloCard{
            margin-top: 5px;
            margin-left: 7%;
            margin-bottom: 0px;
            font-size: 20px;
            font-weight: bold;
            color: white
        }
        #form-conta{
            width: 90%;
            background-color: #7A9FBF;
            border-radius: 10px;
        }
        .card-conta{
            border: 1px solid black;
            border-radius: 5px;
            width: 80%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
        }
        .card-conta p{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .card-conta button{
            border-radius: 5px;
            outline: none;
            border: none;
            background-color: #0D0D0D;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: bold;
        }
        #nav-conta{
            background-color: #0D0D0D;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            align-self: center;
            padding: 20px;
            height: 30px;
            margin-bottom: 10px;
        }
        #nav-conta p{
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
        }
        .noStyleA{
            text-decoration: none;
        }
        #alterar{
            padding: 2px;
            border: 1px solid black;
            border-radius: 5px;
            width: 100px;
            margin-top: 10px;
            margin-right: 10px;
            text-align: center;
            background-color: rgb(158, 158, 243);
            color: white;
        }
        #msg{
            text-align: center;
        }
        #sair{
            padding: 2px;
            border: 1px solid black;
            border-radius: 5px;
            width: 100px;
            text-align: center;
            margin-top: 10px;
            background-color: rgb(236, 100, 100);
            color: white;
        }
        #btns{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body id="body-conta">
    <nav id="nav-conta">
        <p>Eta Carinae</p>
        <a href="home.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
    </nav>
    <main id="main-conta">
        <form method="post" id="form-conta">
            <p class="tituloCard">Conta</p>
            <div class="card-conta">
                <?php
                    $query = 'SELECT * FROM tb_usuario WHERE cd = '.$_SESSION['cdUser'];
                    $res = $GLOBALS['conn']->query($query);
                    foreach($res as $row){
                        $query2 = 'SELECT * FROM tb_empresa WHERE cd = '.$row['id_empresa'];
                        $res2 = $GLOBALS['conn']->query($query2);
                        $grupo = "";
                        foreach($res2 as $row2){
                            $grupo = $row2['nm_empresa']; 
                        }
                        if($grupo == ""){
                            $grupo = "Sem empresa";
                        }
                        echo '
                            <p>ID de usuário: '.$row['cd'].'</p>
                            <p>Nome: '.$row['nm_usuario'].'</p>
                            <p>Email: '.$row['email_usuario'].'</p>
                            <p>Empresa: '.$grupo.'</p> 
                            <div id="btns">
                                <button id="alterar">Alterar</button>
                                <button id="sair" name="sair">Sair</button>
                            </div>
                        ';
                    }
                ?>
            </div>    
        </form>
           
        <div id="msg"></div>
    </main>
    <script>
        let alterar = document.getElementById('alterar');
        let msg = document.getElementById('msg');
        alterar.addEventListener('click', ()=>{
            let text = '<h3>Acesse o site de nosso app <br>para alterar seus dados</h3>';
            text += '<h3>(URL do Site)</h3>';
            msg.innerHTML = text;
        });
    </script>
</body>
</html>