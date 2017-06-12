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
require "modelEmpresa.php";

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case "cadastrar":
	$dadosgrupo = listarGrupo($conexao);
	require "viewCadastrar.php";

	break;
case "excluir":

	$retornoExc = excluirUsuario($conexao);
	$dados = listarUsuario($conexao);
	require "viewListar.php";
	break;

case "listar":
	$dados = listarEmpresa($conexao);
	require "viewListar.php";
	break;

case "dashempresa":
	# listar...
	//	$dados = listarUsuario($conexao);
	require "viewDashEmpresa.php";
	break;

case "btncadastrar":
	cadastrarEmpresa($conexao, $titulo);
	break;

default:
	# listar...
	//	$dados = listarUsuario($conexao);
	require "viewDashEmpresa.php";
	break;
}

function listarEmpresa($conexao) {
	$resultado = _listaEmpresa($conexao);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("cpf" => $row["cpf"], "email" => $row["email"], "nome" => $row["nome"], "tipo" => $row["tipo"]);
	}

	return $data;

}

function listarGrupo($conexao) {
	$resultado = _listaGrupoEmpresa($conexao);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("id" => $row["id"], "descricao" => $row["descricao"]);
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

function cadastrarEmpresa($conexao, $titulo) {
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroEmpresa'])) {
		//O formulario foi postado
		$nome = $_POST['txtNome'];
		$idgrupoempresa = $_POST['grupoempresa'];

		if (_cadastrarEmpresa($conexao, $nome, $idgrupoempresa)) {
			$retornoExc = "Empresa cadastrada com sucesso!";
			//$dados = listarEmpresa($conexao);
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