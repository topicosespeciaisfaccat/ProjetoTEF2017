<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
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
	case "obterCargoSolicitacao":
		_obterCargoSolicitacao($conexao);
		break;
	case "obterEmpresaSolicitacao":
		_obterEmpresaSolicitacao($conexao);
		break;

	case "obterUsuarioSolicitacao":
		_obterUsuarioSolicitacao($conexao);
		break;
	}
}

/*function _obterUsuario($conexao, $key) {
$sql = "SELECT cpf, nome from usuario  where nome like '" . $key . "%'  order by nome ";
$resultado = mysqli_query($conexao, $sql);
$found = mysqli_num_rows($resultado);

//$rows = array();

//while ($temp = mysqli_fetch_assoc($resultado)) {		$rows[] = $temp;	}

//https://agung-setiawan.com/how-to-create-ajax-search-using-php-jquery-and-mysql/

if ($found > 0) {
while ($row = mysqli_fetch_assoc($resultado)) {

echo "<li>$row[nome]</br><a id='rPesquisa'>$row[cpf]</a></li>";
}
} else {
echo "<li> Não encotrou informação! <li>";
}

//echo json_encode($rows);
}*/

function _obterUsuarioSolicitacao($conexao) {

	$sql = sprintf("SELECT cpf, nome  from usuario order by nome; ");
	$resultado = mysqli_query($conexao, $sql);
	$rows = array();

	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rows[] = $temp;
	}

	echo json_encode($rows);

}

function _obterCargoSolicitacao($conexao) {

	$sql = sprintf("SELECT id, descricao cargo FROM cargo;");
	$resultado = mysqli_query($conexao, $sql);
	$rows = array();

	while ($temp = mysqli_fetch_assoc($resultado)) {
		$rows[] = $temp;
	}

	echo json_encode($rows);

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