<?php

if (!isset($_COOKIE['tipoUsuario']) && $_COOKIE['tipoUsuario'] != 'Administrador') {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

$titulo = "Manutenção de usuario";

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}
/*
qual sera a view a ser carregada
p = listar e p = cadastrar e p=excluir
 */
require "modelFuncionario.php";

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case "cadastrar":
	cadastrarFuncionario($conexao);

	break;
case "excluir":

	$retornoExc = excluirFuncionario($conexao);
	$dados = _listarFuncionario($conexao);
	require "viewListar.php";
	break;

case "alterar":

	alterarFuncionario($conexao);
	break;

default:
	# listar...
	$dados = _listarFuncionario($conexao);
	require "viewListar.php";
	break;
}

/*function cadastrarFuncionario($conexao) {
if (isset($_POST['formularioCadastroFuncionario'])) {

$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$empresa = $_POST['empresa'];

$resultado = _cadastrarFuncionario($conexao, $usuario, $cargo, $empresa);
if (!$resultado) {
echo "Falha ao cadastrar funcionario ";
return false;
} else {

$retornoExc = "Usuario alterado com sucesso!";

require "viewListar.php";
}
}

}*/

function listarUsuario($conexao) {
	$resultado = _listaFuncionario($conexao);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("cpf" => $row["cpf"], "email" => $row["email"], "nome" => $row["nome"], "tipo" => $row["tipo"]);
	}

	return $data;

}

function _listarFuncionario($conexao) {

	$resultado = _obterFuncionario($conexao);
	//$dados = mysqli_fetch_assoc($resultado);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("codigo" => $row["codigo"], "cargo" => $row["cargo"], "funcionario" => $row["funcionario"], "empresa" => $row["empresa"], "cpf" => $row["cpf"]);
	}

	return $data;
}

function obterCargo($conexao) {

	$data = array();
	$resultado = _obterCargo($conexao);

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("id" => $row["id"], "cargo" => $row["cargo"]);
	}

	return json_encode($data);
	//echo json_encode($data);
	exit();
}

function obterEmpresa() {
	$resultado = _obterEmpresa($conexao);
	$dados = mysqli_fetch_assoc($resultado);
	echo json_encode($dados);
}

function obterUsuario() {
	$resultado = _obterUsuario($conexao);
	$dados = mysqli_fetch_assoc($resultado);
	echo json_encode($dados);
}

function alterarFuncionario($conexao) {

	if (isset($_POST['frmAlterarUsuario'])) {

		$codigo = $_POST['frmAlterarUsuario'];
		$cargo = $_POST['cargo'];
		$empresa = $_POST['empresa'];

		$resultado = _alterarFuncionarioPorCodigo($conexao, $cargo, $empresa, $codigo);

		if (!$resultado) {
			echo "Falha ao alterar Funcionario, cfp :" . $cpf;
			return false;
		} else {

			$retornoExc = "Funcionario alterado com sucesso!";
			$dados = _listarFuncionario($conexao);
			require "viewListar.php";
		}

	} else {
		$cpf = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;
		$resultado = _obterFuncionarioPorCodigo($conexao, $cpf);

		if (!$resultado) {
			echo "Falha em buscar Funcionario por cfp :" . $cpf;
			return false;
		} else {
			$dados = mysqli_fetch_assoc($resultado);
			require "viewAlterar.php";
		}
	}

}

function excluirFuncionario($conexao) {

	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;

	$resultado = _excluirFuncionario($conexao, $codigo);

	if ($resultado) {
		return "Exclusão efetuada com sucesso!";
	} else {
		return "";
	}
}

function cadastrarFuncionario($conexao) {

	//var_dump($_POST['formularioCadastroFuncionario']);
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroFuncionario'])) {
		//O formulario foi postado
		$usuario = $_POST['usuario'];
		$cargo = $_POST['cargo'];
		$empresa = $_POST['empresa'];
		$retorno = _cadastrarFuncionario($conexao, $cargo, $empresa, $usuario);

		//var_dump($retorno);

		if ($retorno) {
			$dados = _listarFuncionario($conexao);
			require "viewListar.php";
		} else {
			echo "o cadastro falhou";
			$dados = _listarFuncionario($conexao);
			require "viewListar.php";
		}

	} else {

		require "viewCadastrar.php";
	}
}

@mysqli_close($conexao);