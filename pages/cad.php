<?php 
include('../php/config.php');
if($_POST){
    if(isset($_POST['cad-emp'])){   
        CadastrarEmpresa($_POST['nome-emp'], $_POST['desc-emp']);
    }else if(isset($_POST['ent-emp'])){
        EntrarEmpresa($_POST['id-share']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saturn</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <style>
        #tags{
            width: 100%;
        }
        #form-cad input{
            margin-top: 10px;
        }
        .org{
            margin-top: 20px;
            width: 100%;
            text-align: left;
        }
        #form-cad button{
            margin-top: 20px;
        }
    </style>
</head>
<body id="body-cad">
    <nav id="nav-cad">
        <p>Saturn</p>
        <?php
            if($_GET['criar']){
                            echo '
                            <a href="atividades.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
                            ';
                        }else if($_GET['entrar']){
                            echo '
                            <a href="atividades.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
                            ';
                        }else if($_GET['nova-ativ']){
                            echo '
                            <a href="home.php"><img src="../imgs/icones/voltar.png" alt="Icone de conta" width="30px"></a>
                            ';
                        }
        ?>
    </nav>
    <main id="main-cad">
        <section id="section-cad">
            <form method="post" autocomplete="off" id="form-cad">
                <?php
                    // $id_emp = 1234;
                    // $nome = "Mandioca assada";
                    // $id_share = strtolower(substr($nome, 0, 2));
                    // $id_share .= $id_emp;
                    // echo $id_share;
                    if($_GET){
                        if($_GET['criar']){
                            echo '
                            <p>Cadastrar empresa</p>
                            <input type="text" id="nome" name="nome-emp" placeholder="Nome" class="inputLogCad">
                            <textarea name="desc-emp" class="inputLogCad" style="resize:none;height:30px;margin-top:20px;" cols="40" placeholder="Descrição"></textarea>
                            <button name="cad-emp">Cadastrar</button>
                            ';
                        }else if($_GET['entrar']){
                            echo '
                            <p>Entrar em uma empresa</p>
                            <input type="text" id="id" name="id-share" placeholder="Id de compartilhamento" class="inputLogCad">
                            <button name="ent-emp">Entrar</button>
                            ';
                        }else if($_GET['nova-ativ']){
                            echo '
                            <p>Cadastrar nova atividade</p>
                            <input type="text" name="nm-ativ" class="inputLogCad" placeholder="Nome da atividade:">
                            <textarea name="desc-ativ" class="inputLogCad" style="resize:none;height:30px;margin-top:20px;" cols="40" placeholder="Descrição da atividade:"></textarea>
                            <div class="org"><label for="dt-entrega">Data de entrega:</label></div>
                            <input type="date" name="dt-entrega" id="dt-entrega">
                            <div class="org"><label for="tags">Tag da atividade:</label></div>
                            <select name="tags" id="tags">
                                <option value="">Tag 1</option>
                                <option value="">Tag 2</option>
                            </select>
                            <button name="cad-ativ">Criar</button>
                            ';
                        }
                    }
                ?>
                
                
            </form>
        </section>
    </main>
</body>
</html>