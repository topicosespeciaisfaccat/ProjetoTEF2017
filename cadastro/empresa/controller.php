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
function get_post_action($name) {
	$params = func_get_args();
	foreach ($params as $name) {
		if (isset($_POST[$name])) {
			return $name;
		}
	}
}
if (isset($_POST['formularioDashboard'])) {
	switch (get_post_action('CadastroEmpresa', 'ListaEmpresa')) {
	case 'CadastroEmpresa':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/empresa&p=cadastrar");
		break;
	case 'ListaEmpresa':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/empresa&p=listar");
		break;
	default:
//no action sent
	}
}
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
	$retornoExc = excluirEmpresa($conexao);
	$dadosempresa = listarEmpresa($conexao);
	require "viewListar.php";
	break;
case "listar":
	$dadosempresa = listarEmpresa($conexao);
	require "viewListar.php";
	break;
case "dashempresa":
	# listar...
	//	$dados = listarUsuario($conexao);
	require "viewDashEmpresa.php";
	break;
case "btncadastrar":
	cadastrarEmpresa($conexao);
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
		$data[] = array("id" => $row["id"], "descricao" => $row["descricao"], "grupo" => $row["grupo"]);
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

function cadastrarEmpresa($conexao) {
	$titulo = "Cadastrar Empresa";
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroEmpresa'])) {
		//O formulario foi postado
		//$id = $_POST['txtId'];
		$nome = $_POST['txtNome'];
		$idgrupoempresa = $_POST['idgrupoempresa'];
		//var_dump($nome, $idgrupoempresa, $conexao);
		$resultado = _cadastrarEmpresa($conexao, $nome, $idgrupoempresa);
		if ($resultado) {
			$retornoExc = "Empresa ".$nome." cadastrada com sucesso!";
			//$dados = listarEmpresa($conexao);
			require "viewDashEmpresa.php";
		} else {
			echo "o cadastro falhou";
			require "viewDashEmpresa.php";
		}
	} else {
		require "viewCadastrar.php";
	}
}

function excluirEmpresa($conexao) {

	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;

	$resultado = _excluirEmpresa($conexao, $codigo);

	if ($resultado) {
		return "Exclusão efetuada com sucesso!";
	} else {
		return "";
	}
}



@mysqli_close($conexao);