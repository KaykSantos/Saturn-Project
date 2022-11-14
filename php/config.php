<?php 
header("Access-Control-Allow-Origin: *");
session_start();
define('HOST', 'localhost');
define('USUARIO', 'devjekvf_user');
define('SENHA', 'niohectmuckz');
define('DB', 'devjekvf_biblioteca');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar ao banco');

// CRUD do usuário
function CadastrarUsuario($nome, $email, $senha){
    $query = 'SELECT * FROM tb_usuario WHERE email_usuario = "'.$email.'"';
    $res = $GLOBALS['conn']->query($query);
    $user = mysqli_num_rows($res);
    if($user > 0){
        echo 'Email já utilizado';
    }else{
        $query = 'INSERT INTO tb_usuario (nm_usuario, email_usuario, senha, status_usuario)
        VALUES ("'.$nome.'", "'.$email.'", "'.$senha.'", "Ativo")';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            $_SESSION['cad-realizado'] = true;
            header('Location: login.php');
        }else{
            $_SESSION['error-cad'] = true;
            
        }
    }
}
function LoginUsuario($email, $senha, $type){
    $query = 'SELECT * FROM tb_usuario WHERE email_usuario = "'.$email.'" AND senha = "'.$senha.'"';
    $res = $GLOBALS['conn']->query($query);
    $rows = mysqli_num_rows($res);
    if($rows == 1){
        foreach($res as $row){
            if($row['status_usuario'] == "Bloqueado"){
                $_SESSION['user-bloq'] = true;
            }else{
                $_SESSION['cdUser'] = $row['cd'];
                $_SESSION['nmUser'] = $row['nm_usuario'];
                header('Location: ./pages/home.php');
            }
        }
    }else{
        $_SESSION['error-senha'] = true;
        //echo 'Usuario e/ou senha inválidos! Tente novamente.';
    }
}
function LoginMobile($email, $senha){
    $query = 'SELECT * FROM tb_usuario WHERE email_usuario = "'.$email.'" AND senha = "'.$senha.'"';
    $res = $GLOBALS['conn']->query($query);
    $rows = mysqli_num_rows($res);
    if($rows == 1){
        $return['erro'] = false;
        $user = $res->fetch_object();
        $return['dados'] = $user;
    }else{
        $return['erro'] = true;
    }
    echo json_encode($return);
}
function Sair(){
    session_start();
    session_destroy();
    exit();
}
function CadastrarEmpresa($nome, $descricao){
    $id_share = strtolower(substr($nome, 0, 2));
    $query = 'INSERT INTO tb_empresa (nm_empresa, ds_empresa) VALUES ("'.$nome.'","'.$descricao.'")';
    $res = $GLOBALS['conn']->query($query);
    echo "sas";
    // $id_emp = mysql_insert_id();
    // $id_share .= $id_emp;
    // if($res){
    //     $query = 'UPDATE tb_empresa SET id_share = '.$id_share.' WHERE cd = '.$id_emp;
    //     $res = $GLOBALS['conn']->query($query);
    //     if($res){
    //         $query = 'INSERT INTO tb_empresa_usuario (id_usuario, id_empresa, adm) VALUES ('.$_SESSION['cdUser'].', '.$id_emp.', 1)';
    //         $res = $GLOBALS['conn']->query($query);
    //         if($res){
    //             echo 'Cadastro de empresa realizado com sucesso!';
    //         }else{
    //             echo 'Erro ao realizar cadastro (tabela empresa_usuario)'.$GLOBALS['conn']->error;
    //         }
    //     }else{
    //         echo 'Erro ao realizar cadastro do ID'.$GLOBALS['conn']->error;
    //     }
    // }else{
    //     echo 'Erro ao realizar cadastro!';
    // }
}
function EntrarEmpresa($id){
    $query = 'SELECT * FROM tb_empresa WHERE id_share = '.$id;
    $res = $GLOBALS['conn']->query($query);
    foreach($res as $row){
        echo "empresa";
    }
    // if($res){
    //     $query = 'INSERT INTO tb_empresa_usuario (id_empresa, id_usuario, adm) VALUES ()';
    // }
}
function ListarTags($id_emp, $id_tag){
    $query = 'SELECT * FROM tb_empresa_tags WHERE id_empresa = '.$id_emp;
    if($id_tag != 0){
        $query .= ' AND id_tag = '.$id_tag;
    }
    $res = $GLOBALS['conn']->query($query);
    return $res;
}
function EmpresaUsuario(){
    $query = 'SELECT * FROM tb_empresa_usuario WHERE id_usuario = '.$_SESSION['cdUser'];
    $res = $GLOBALS['conn']->query($query);
    if($res){
        $return['rows'] = mysqli_num_rows($res);
        $return['res'] = $res;
        $return['dados'] = $res->fetch_object();
        return $return;
    }
}