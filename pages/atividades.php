<?php
include('../php/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades - Eta Carinae</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />-->
    <style>
        @charset "UTF-8";
            @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            #body-ativ{
                font-family: 'Work Sans', sans-serif;
                background-color: white;
                margin: 0px;
                padding: 0px;
            }
            #main-ativ{
                display: flex;
                flex-direction: column;
                margin-left: auto;
                margin-right: auto;
                justify-content: center;
                align-items: center;
                margin-bottom:150px;
            }
            .tituloCard{
                margin-top: 5px;
                margin-left: 8vw;
                margin-bottom: 0px;
                font-size: 20px;
                font-weight: bold;
                color: white
            }
            #form-ativ{
                width: 90%;
                background-color: #white;
                border: 1px solid black;
                border-radius: 5px;
                padding-bottom: 10px;
                box-shadow: 4px 3px rgb(117, 114, 114);
            }
            .card-ativ{
                border: 1px solid black;
                border-radius: 5px;
                width: 80%;
                padding: 10px;
                margin-top: 10px;
                margin-left: auto;
                margin-right: auto;
                background-color: white;
            }
            .card-ativ p{
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .card-ativ button{
                border-radius: 5px;
                outline: none;
                border: none;
                background-color: #0D0D0D;
                color: white;
                font-size: 15px;
                text-transform: uppercase;
                font-weight: bold;
                color: white
            }
            #nav-ativ{
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
            #nav-ativ p{
                font-size: 25px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
            }
            .noStyleA{
                text-decoration: none;
            }
    </style>
</head>
<body id="body-ativ">
    <nav id="nav-ativ">
        <p>Saturn</p>
        <a href="home.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
    </nav>
    <main id="main-ativ">
        <form id="form-ativ">
            
            <?php
                $query = 'SELECT * FROM tb_usuario WHERE cd = '.$_SESSION['cdUser'];
                $res = $GLOBALS['conn']->query($query);
                $empresa = "";
                foreach($res as $row){
                    $empresa = $row['id_empresa'];
                }
                if($empresa == ""){
                    echo '
                        <div class="card-ativ">
                            <p>Entre em uma empresa para poder receber atividades.</p>
                            <a href="cad.php?entrar=1" class="noStyleA">Entrar</a>
                            <a href="cad.php?criar=1" class="noStyleA">Criar empresa</a>
                        </div>
                    ';
                }
            ?>
            <!--<p class="tituloCard">Atividades:</p>
                <div class="card-ativ">
                <p>Atividade: Título (1)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (2)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (3)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (4)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (5)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (6)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (7)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (8)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>
            <div class="card-ativ">
                <p>Atividade: Título (9)</p>
                <p>Tag: Nome Tag</p>
                <p>Vencimento: dd/mm/yyyy</p>
                <button>Abrir</button>
            </div>-->
        </form>       
    </main>
</body>
</html>