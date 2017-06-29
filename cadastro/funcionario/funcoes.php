<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "meuazuresql";

$conexao = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}

if (isset($_POST['funcao'])) {
	$funcao = $_POST['funcao'];
	switch ($funcao) {
	case "obterCargoSolicitacao":
		_obterCargo($conexao);
		break;
	case "obterEmpresaSolicitacao":
		_obterEmpresa($conexao);
		break;

	case "obterUsuarioSolicitacao":
		$key = $_POST['key'];
		_obterUsuario($conexao, $key);
		break;
	}
}

function _obterUsuario($conexao, $key) {
	$sql = "SELECT cpf+' - '+ nome  from usuario  where nome like '" . $key . "'  order by nome ";
	$resultado = mysqli_query($conexao, $sql);
	$rows = array();

	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rows[] = $temp;
	}

	echo json_encode($rows);
}

function _obterCargo($conexao) {

	$sql = sprintf("SELECT id, descricao cargo FROM cargo;");
	$resultado = mysqli_query($conexao, $sql);
	$rows = array();

	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rows[] = $temp;
	}

	echo json_encode($rows);
}

function _obterEmpresa($conexao) {
	$sql = sprintf("SELECT empresa.id,
					       empresa.descricao empresa
					FROM empresa");
	$resultado = mysqli_query($conexao, $sql);
	$rows = array();
	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rows[] = $temp;
	}

	echo json_encode($rows);
}
