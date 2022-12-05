<?php
include('../php/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos - Eta Carinae</title>
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
                margin-bottom:100px;
            }
            .tituloCard{
                margin-top: 5px;
                margin-left: 2vw;
                margin-bottom: 0px;
                font-size: 20px;
                font-weight: bold;
                color: black;
            }
            #form-ativ{
                width: 60%;
                background-color: #white;
                border: 1px solid black;
                border-radius: 5px;
                padding-bottom: 10px;
                box-shadow: 4px 3px rgb(117, 114, 114);
                display: flex;
                flex-direction: column;
            }
            .card-ativ{
                border: 1px solid black;
                border-radius: 5px;
                width: 90%;
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
            #nav-ativ div{
                height: 50px;
            }
            .noStyleA{
                text-decoration: none;
                color: white;
            }
            #nova-at{
                float: right;
            }
            .card-arch{
                border: 1px solid black;
                border-radius: 5px;
                width: 200px;
                height: 150px;
                padding: 10px;
                margin-top: 10px;
                /*margin-left: 10px;*/
                margin-left: auto;
                margin-right: auto;
                background-color: white;
            }
            .card-arch p{
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .card-arch button{
                border-radius: 5px;
                outline: none;
                border: none;
                background-color: #0D0D0D;
                color: white;
                font-size: 15px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
            }
            #form-arch-home{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                background-color: white;
                padding-bottom: 10px;
            }
    </style>
</head>
<body id="body-ativ">
    <nav id="nav-ativ">
        <p>Saturn</p>
        <a href="home.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" height="30px"></a>
    </nav>
    <main id="main-ativ">
        <form id="form-ativ">
            <p class="tituloCard">Arquivos:</p>
            <div id="form-arch-home">         
            <?php
                $query = 'SELECT * FROM vwArquivos WHERE id_empresa = '.$_SESSION['cdEmp'].' ORDER BY dt_postagem DESC';
                $res = $GLOBALS['conn']->query($query);
                foreach($res as $row){
                    $dt_postagem = date('d/m/Y', strtotime($row['dt_postagem']));
                        echo '
                            <div class="card-arch">
                                <div class="text"> 
                                <p>Atividade: '.$row['nm_arquivo'].'</p>
                                <p>Tag: '.$row['nm_tag'].'</p>
                                <p>Postado por: '.$row['nm_usuario'].', em '.$dt_postagem.'.</p>
                                </div>
                                <button><a href="cad.php?arch='.$row['cd'].'" class="noStyleA">Abrir</a></button>
                            </div>
                        ';
                }
            ?>
            </div>
        </form>       
    </main>
</body>
</html>