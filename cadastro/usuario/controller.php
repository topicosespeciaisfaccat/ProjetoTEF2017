<?php

if (!isset($_COOKIE['tipoUsuario'])) {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

$titulo = "Manutenção de usuario";

$conexao = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}
/*
qual sera a view a ser carregada
p = listar e p = cadastrar e p=excluir
 */
require "modelUsuario.php";

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case "cadastrar":
	cadastrarUsuario($conexao, $titulo);

	break;
case "excluir":

	$retornoExc = excluirUsuario($conexao);
	$dados = listarUsuario($conexao);
	require "viewListar.php";
	break;

default:
	# listar...
	$dados = listarUsuario($conexao);
	require "viewListar.php";
	break;
}

function listarUsuario($conexao) {
	$resultado = _listaUsuario($conexao);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("cpf" => $row["cpf"], "email" => $row["email"], "nome" => $row["nome"], "tipo" => $row["tipo"]);
	}

	return $data;

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

function cadastrarUsuario($conexao, $titulo) {
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