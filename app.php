<?php

$db_host = "br-cdbr-azure-south-b.cloudapp.net";
$db_user = "b92b3058bbebc1";
$db_pass = "f582640e";
$db_name = "meuazuresql";

$conexao = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}