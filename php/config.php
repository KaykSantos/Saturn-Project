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
        $query = 'INSERT INTO tb_usuario (nm_usuario, email_usuario, senha, status_usuario, empresa)
        VALUES ("'.$nome.'", "'.$email.'", "'.$senha.'", "Ativo", 0)';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            $_SESSION['cad-realizado'] = true;
            header('Location: login.php');
        }else{
            $_SESSION['error-cad'] = true;
            
        }
    }
}
function CadastrarUsuarioMobile($nome, $email, $senha){
    $query = 'SELECT * FROM tb_usuario WHERE email_usuario = "'.$email.'"';
    $res = $GLOBALS['conn']->query($query);
    $user = mysqli_num_rows($res);
    if($user > 0){
        $return['email'] = true;
        $return['erro'] = true;
    }else{
        $query = 'INSERT INTO tb_usuario (nm_usuario, email_usuario, senha, status_usuario, empresa)
        VALUES ("'.$nome.'", "'.$email.'", "'.$senha.'", "Ativo", 0)';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            $return['erro'] = false;
            $return['dados'] = $res;
        }else{
            $return['erro'] = true;
        }
    }
    echo json_encode($return);
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
                $_SESSION['cdEmp'] = $row['empresa']; 
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
    $id_emp = $GLOBALS['conn']->insert_id;
    $id_share .= $id_emp;
    if($res){
        $query = 'UPDATE tb_empresa SET id_share = "'.$id_share.'" WHERE cd = '.$id_emp;
        $res = $GLOBALS['conn']->query($query);
        if($res){
            $query = 'INSERT INTO tb_empresa_usuario (id_usuario, id_empresa, adm) VALUES ('.$_SESSION['cdUser'].', '.$id_emp.', 1)';
            $res = $GLOBALS['conn']->query($query);
            if($res){
                $query = 'UPDATE tb_usuario SET empresa = '.$id_emp.' WHERE cd = '.$_SESSION['cdUser'];
                $res = $GLOBALS['conn']->query($query);
                if($res){
                    header("Location: home.php");
                    $_SESSION['cdEmp'] = $id_empresa;
                    $_SESSION['make-emp'] = true;
                }else{
                    echo 'Erro ao realizar cadastro (atualização tabela usuario)'.$GLOBALS['conn']->error;
                }
            }else{
                echo 'Erro ao realizar cadastro (tabela empresa_usuario)'.$GLOBALS['conn']->error;
            }
        }else{
            echo 'Erro ao realizar cadastro do ID'.$GLOBALS['conn']->error;
        }
    }else{
         echo 'Erro ao realizar cadastro!';
    }
}
function EntrarEmpresa($id){
    $query = 'SELECT * FROM tb_empresa WHERE id_share = "'.$id.'"';
    $res = $GLOBALS['conn']->query($query);
    $emp = $res->fetch_object(); 
    if($res){
        $id_empresa = $emp->cd;
        $query = 'INSERT INTO tb_empresa_usuario (id_empresa, id_usuario, adm) VALUES ('.$id_empresa.', '.$_SESSION['cdUser'].', 0)';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            $query = 'UPDATE tb_usuario SET empresa = '.$id_empresa.' WHERE cd = '.$_SESSION['cdUser'];
            $res = $GLOBALS['conn']->query($query);
            if($res){
                header("Location: home.php");
                $_SESSION['cdEmp'] = $id_empresa;
                $_SESSION['ent-emp'] = true;
            }else{
                echo 'Erro ao entrar na empresa (atualizar tabela usuario) '.$GLOBALS['conn']->error;
            }
        }else{
            echo 'Erro ao entrar na empresa '.$GLOBALS['conn']->error;
        }
    }
}
function ListarTag($id_emp, $id_tag){
    $query = 'SELECT * FROM tb_tags WHERE id_empresa = '.$id_emp;
    if($id_tag != 0){
        $query .= ' AND cd = '.$id_tag;
    }
    $res = $GLOBALS['conn']->query($query);
    return $res;
}
function ListarUsuario($cd, $empresa){
    $query = 'SELECT * FROM tb_usuario';
    $ver == false;
    
    if($cd != 0){
        $query .= ' WHERE cd = '.$cd.'';
        if($empresa != 0){
            $query .= ' AND empresa = '.$empresa;
            $ver = true;
        }
    }
    if($ver == false){
       if($empresa != 0){
            $query .= ' WHERE empresa = '.$empresa;
            if($cd != 0){
                $query .= ' AND cd = '.$cd.'';
            }
        } 
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
function CadastrarAtividade($nome, $descricao, $prazo, $tag){
    //cd	nm_atividade	ds_atividade	status_atividade	dt_postagem	dt_entrega	id_admin	id_tag	id_empresa
    $statusAtt = "Pendente";
    $dataAtual = date('Y-m-d'); //Data atual
    $id_admin = $_SESSION['cdUser'];
    $id_empresa = $_SESSION['cdEmp'];
    $query = 'INSERT INTO tb_atividade (nm_atividade, ds_atividade, status_atividade, dt_postagem, dt_entrega, id_admin, id_tag, id_empresa)
    VALUES ("'.$nome.'", "'.$descricao.'", "'.$statusAtt.'", "'.$dataAtual.'", "'.$prazo.'", '.$id_admin.','.$tag.', '.$id_empresa.')';
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo 'Atividade criada com sucesso!';
    }else{
        echo 'Erro ao realizar cadastro!'.$GLOBALS['conn']->error;
    }
}
function CadastrarTag($tag, $id_emp){
    $query = 'INSERT INTO tb_tags (nm_tag, id_empresa) VALUES ("'.$tag.'", '.$id_emp.')';
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo 'Tag cadastrada com sucesso';
    }else{
        echo 'Erro ao cadastrar tag';
    }
}
function VerificarAdm($cdUser){
    $query = 'SELECT * FROM tb_empresa_usuario WHERE id_usuario = '.$cdUser.' AND adm = 1';
    $res = $GLOBALS['conn']->query($query);
    $row = mysqli_num_rows($res);
    $adm = false;
    if($row == 1){
        $adm = true;
    }else if($row == 0){
        $adm = false;
    }
    return $adm;
}
function UploadArchive($archive, $desc, $tag){
    $dataAtual = date('Y-m-d'); //Data atual
    $dir = 'arquivos/';
    // print_r($archive);
    if(move_uploaded_file($archive['tmp_name'], $dir.'/'.$archive['name'])){
        $query = 'INSERT INTO tb_arquivo (nm_arquivo, ds_arquivo, id_empresa, id_admin, id_tag, dt_postagem) 
        VALUES ("'.$archive['name'].'", "'.$desc.'", '.$_SESSION['cdEmp'].', '.$_SESSION['cdUser'].', '.$tag.', "'.$dataAtual.'")';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            echo 'Arquivo upado e cadastrado!';
        }else{
            echo 'Erro ao cadastrar!'.$GLOBALS['conn']->error;
        }
    }else{
        echo 'Erro ao upar arquivo! '.$GLOBALS['conn']->error;
    }
}
function ListarAtividadesMobile($cd, $emp){
    $query = 'SELECT * FROM vwAtividades';
    
    if($cd != 0){
        $query .= ' WHERE cd = '.$cd.'';
        if($emp != 0){
            $query .= ' AND id_empresa = '.$emp;
            $ver = true;
        }
    }
    if($ver == false){
       if($emp != 0){
            $query .= ' WHERE id_empresa = '.$emp;
            if($cd != 0){
                $query .= ' AND cd = '.$cd.'';
            }
        } 
    }    
    $res = $GLOBALS['conn']->query($query);
    return $res;
}
function ListarArquivosMobile($cd, $emp){
    $query = 'SELECT * FROM vwArquivos';
    
    if($cd != 0){
        $query .= ' WHERE cd = '.$cd.'';
        if($emp != 0){
            $query .= ' AND id_empresa = '.$emp;
            $ver = true;
        }
    }
    if($ver == false){
       if($emp != 0){
            $query .= ' WHERE id_empresa = '.$emp;
            if($cd != 0){
                $query .= ' AND cd = '.$cd.'';
            }
        } 
    }    
    $res = $GLOBALS['conn']->query($query);
    return $res;
}