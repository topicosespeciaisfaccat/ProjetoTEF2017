<?php
$db_host = "br-cdbr-azure-south-b.cloudapp.net";
$db_user = "b92b3058bbebc1";
$db_pass = "f582640e";
$db_name = "meuazuresql";

/*$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "meuazuresql";*/

$conexao = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}

if (isset($_POST['funcao'])) {
	$funcao = $_POST['funcao'];

	switch ($funcao) {

	case "obterEmpresaSolicitacao":
		_obterEmpresaSolicitacao($conexao);
		break;

	}
}

function _obterEmpresaSolicitacao($conexao) {
	$sql = "select  id, descricao empresa from empresa ";
	mysqli_set_charset($conexao, "utf8");
	$resultado = mysqli_query($conexao, $sql);

	$rowsEmpresa = array();

	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rowsEmpresa[] = $temp;
	}

	//var_dump(json_encode($rowsEmpresa));

	echo json_encode($rowsEmpresa);
}
