<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
//verica os ips que estão na nossa bloklist e redireciona para pagina acessoNegado.php
$ipsBloqueados = array("127.0.0.2");

foreach ($ipsBloqueados as $key) {

	if ($key == $_SERVER['REMOTE_ADDR']) {
		header("Location: /ProjetoTEF2017/acessoNegado.php");
		exit();
	}
}

//previne os cache em nossa pagiona

//vamos conectar com o banco de dados
//hot, username, pass, dbname
$db_host = "br-cdbr-azure-south-b.cloudapp.net";
$db_user = "b92b3058bbebc1";
$db_pass = "f582640e";
$db_name = "meuazuresql";

//vamos receber uma variavel chamada r que significa rota
//$r = "login";
//require_once $r . "/index.php";
if (isset($_GET['r'])) {
	$r = $_GET['r'];
	require_once $r . "/index.php";
} else {
	$r = "login";
	require_once $r . "/index.php";
}


