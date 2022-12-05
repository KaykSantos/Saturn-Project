<?php
include('../php/config.php');
if(!isset($_SESSION['cdUser'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Saturn</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />-->
    <style>
        @charset "UTF-8";
            @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            #body-home{
                font-family: 'Work Sans', sans-serif;
                background-color: white;
                margin: 0px;
                padding: 0px;
            }
            #main-home{
                display: flex;
                flex-direction: column;
                margin-left: auto;
                margin-right: auto;
                justify-content: center;
                align-items: center;
            }
            .tituloCard{
                margin-top: 5px;
                margin-left: 2vw;
                margin-bottom: 0px;
                font-size: 20px;
                font-weight: bold;
                color: black;
            }
            #form-home{
                width: 60%;
                background-color: white;
                border-radius: 5px;
                border: 1px solid black;
                padding-bottom: 10px;
                box-shadow: 4px 3px rgb(117, 114, 114); 
            }
            #form-arch-home{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-self: center;
                background-color: white;
                padding-bottom: 10px;
            }
            #d-ativ{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                align-self: center;
                background-color: white;
                padding-bottom: 10px;
            }
            .card-home{
                border: 1px solid black;
                border-radius: 5px;
                width: 300px;
                padding: 10px;
                margin-top: 10px;
                margin-left: auto;
                margin-right: auto;
                background-color: white;
            }
            .card-home p{
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .card-home button{
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
            #nav-home{
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
            #nav-home p{
                font-size: 25px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
            }
            .noStyleA{
                text-decoration: none;
                color: white;
            }
            .btn{
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
            #img-add{
                border: 4px solid white;
                border-radius: 30px;
            }
            .mg{
                margin-bottom: 20px;
            }
            .text{
                height: 120px;
            }
            #ent-emp{
                width: 340px;
                height: 50px;
                background-color: rgb(95, 255, 167);
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                margin-top: 20px;
                border-radius: 10px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 20px;
            }
    </style>
</head>
<body id="body-home">
    <nav id="nav-home">
        <p>Saturn</p>
        <div>
            
            <?php
                $query = 'SELECT * FROM tb_empresa_usuario WHERE id_usuario = '.$_SESSION['cdUser'];
                $res = $GLOBALS['conn']->query($query);
                $rows = mysqli_num_rows($res);
                $emp = $res->fetch_object();
                // $empresa = "";
                // foreach($res as $row){
                //     $empresa = $row[''];
                // }
                if($rows > 0){
                    echo '
                        <a href="atividades.php"><img src="../imgs/icones/atividade.png" alt="Icone de atividades" height="50px"></a>
                    ';
                    if($emp->adm == 1){
                        echo '
                            <a href="cad.php?nova-ativ=1" id="nova-at"><img src="../imgs/icones/add.png" id="img-add" alt="Icone de cadastro de atividade" height="40px"></a>
                        ';
                    }
                }
            ?>
            <a href="conta.php"><img src="../imgs/icones/conta.png" alt="Icone de conta" height="50px"></a>
        </div>
        
    </nav>
    <?php
        if(isset($_SESSION['ent-emp'])):
    ?>   
    <div id="ent-emp">
        <p>Entrou na empresa!</p>
    </div>
    <?php
        endif;
        unset($_SESSION['ent-emp']);
    ?>
    <?php
        if(isset($_SESSION['make-emp'])):
    ?>   
    <div id="ent-emp">
        <p>Criou a empresa!</p>
    </div>
    <?php
        endif;
        unset($_SESSION['make-emp']);
    ?>
    <main id="main-home">
        <form method="post" id="form-home">
            
            <?php
                $query = 'SELECT * FROM tb_usuario WHERE cd = '.$_SESSION['cdUser'];
                $res = $GLOBALS['conn']->query($query);
                $empresa = "";
                foreach($res as $row){
                    $empresa = $row['empresa'];
                }
                if($empresa == 0){
                    echo '
                        <div class="card-home">
                            <p>Entre em uma empresa para poder receber atividades.</p>
                            <button><a href="cad.php?entrar=1" class="btn noStyleA">Entrar</a></button>
                            <button><a href="cad.php?criar=1" class="btn noStyleA">Criar empresa</a></button>
                        </div>
                    ';
                }else{
                    echo '<p class="tituloCard">Atividades:</p>
                            <div id="d-ativ">
                    ';
                    $query = 'SELECT * FROM vwAtividades WHERE id_empresa = '.$_SESSION['cdEmp'].' ORDER BY dt_entrega DESC';
                    $res = $GLOBALS['conn']->query($query);
                    $rows = mysqli_num_rows($res);
                    $vermais = false;
                    if($rows > 2){
                        $query = 'SELECT * FROM vwAtividades WHERE id_empresa = '.$_SESSION['cdEmp'].' ORDER BY dt_entrega DESC LIMIT 0,2';
                        $res = $GLOBALS['conn']->query($query);
                        $vermais = true;
                        $btnVerMais = '<a href="atividades.php" class="tituloCard" style="text-decoration: none;">Ver mais...</a>';
                    }
                    foreach($res as $row){
                        $dt_entrega = date('d/m/Y', strtotime($row['dt_entrega']));
                        echo '
                            <div class="card-home">
                                <p>Nome: '.$row['nm_atividade'].'</p>
                                <p>Tag: '.$row['nm_tag'].'</p>
                                <p>Vencimento: '.$dt_entrega.'</p>
                                <button><a href="cad.php?ativ='.$row['cd'].'" class="noStyleA">Abrir</a></button>
                            </div>
                        ';
                        
                    }
                    if($vermais){
                        echo '</div>';
                        echo $btnVerMais;
                    }else{
                        echo '</div>';
                    }
                }
            ?>
            
        </form>   

            <?php
               
                $query = 'SELECT * FROM tb_usuario WHERE cd = '.$_SESSION['cdUser'];
                $res = $GLOBALS['conn']->query($query);
                $empresa = "";
                foreach($res as $row){
                    $empresa = $row['empresa'];
                }
                if($empresa > 0){
                    echo '
                        <div id="form-home" style="margin-top: 20px;" class="mg">
                            <p class="tituloCard">Arquivos</p>
                            <div id="form-arch-home">                
                    ';
                    $query = 'SELECT * FROM vwArquivos WHERE id_empresa = '.$_SESSION['cdEmp'].' ORDER BY dt_postagem DESC';
                    $res = $GLOBALS['conn']->query($query);
                    $rows = mysqli_num_rows($res);
                    $vermais = false;
                    if($rows > 3){
                        $query = 'SELECT * FROM vwArquivos WHERE id_empresa = '.$_SESSION['cdEmp'].' ORDER BY dt_postagem DESC LIMIT 0,3';
                        $res = $GLOBALS['conn']->query($query);
                        
                        $vermais = true;
                        $btnVerMais = '<a href="archives.php" class="tituloCard" style="text-decoration: none;">Ver mais...</a>';
                    }
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
                    if($vermais){
                        echo '</div>';
                        echo $btnVerMais;
                    }else{
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>