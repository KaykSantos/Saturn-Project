<?php 
include('config.php');

if($_POST){
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])){
        CadastrarUsuarioMobile($_POST['nome'], $_POST['email'], $_POST['password']);
    }else if(isset($_POST['email']) && isset($_POST['password'])){
        LoginMobile($_POST['email'], $_POST['password']);
        
    }
}