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

if (isset($_POST['funcao'])) {
	$funcao = $_POST['funcao'];
	switch ($funcao) {
	case "obterCargoSolicitacao":
		obterCargo($conexao);
		break;
	case "obeterEmpresaSolicitacao":
		obterEmpresa();
		break;
	}
}

switch ($passo) {
case "cadastrar":
	cadastrarFuncionario($conexao);

	break;
case "excluir":

	$retornoExc = excluirFuncionario($conexao);
	$dados = listarFuncionario($conexao);
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

	//return json_encode($data);
	echo json_encode($data);
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

		$cpf = $_POST['frmAlterarUsuario'];
		$nome = $_POST['txtNome'];
		$senha = $_POST['txtSenha'];
		$tipo = $_POST['txtTipo'];

		$resultado = _alterarFuncionarioPorCodigo($conexao, $cpf, $nome, $senha, $tipo);

		if (!$resultado) {
			echo "Falha ao alterar Funcionario, cfp :" . $cpf;
			return false;
		} else {

			$retornoExc = "Funcionario alterado com sucesso!";
			$dados = listarFuncionario($conexao);
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

function excluirUsuario($conexao) {

	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;

	$resultado = _excluirUsuario($conexao, $codigo);

	if ($resultado) {
		return "Exclusão efetuada com sucesso!";
	} else {
		return "";
	}
}

function cadastrarFuncionario($conexao) {
	$titulo = "Cadastrar usuario";
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroUsuario'])) {
		//O formulario foi postado
		$cpf = $_POST['txtCpf'];
		$nome = $_POST['txtNome'];
		$email = $_POST['txtEmail'];
		$senha = $_POST['txtSenha'];
		$tipo = $_POST['txtTipo'];

		if (_cadastrarUsuario($conexao, $cpf, $nome, $email, $senha, $tipo)) {
			$retornoExc = "Usuario cadastrado com sucesso!";
			$dados = listarUsuario($conexao);
			require "viewListar.php";
		} else {
			echo "o cadastro falhou";
			require "viewCadastrar.php";
		}

	} else {
		require "viewCadastrar.php";
	}
}

@mysqli_close($conexao);