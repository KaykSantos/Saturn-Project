<?php 
header("Access-Control-Allow-Origin: *");
    
include('../php/config.php');
    
$cd = isset($_GET['cd']) ? $_GET['cd'] : 0;
$emp = isset($_GET['emp']) ? $_GET['emp'] :0;

$res = ListarArquivosMobile($cd, $emp);

$a = array();
while($p = $res->fetch_object()){
    $a[] = $p;
}

$a = json_encode($a);
echo $a;

?>