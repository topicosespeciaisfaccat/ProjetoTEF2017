<?php
// verifica se os $_COOKIE Estão setados para o usuario e se o usuario é administrador

if (!isset($_COOKIE['tipoUsuario']) && $_COOKIE['tipoUsuario'] != 'Administrador') {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

$titulo = "Manutenção de usuario";

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}
/*qual sera a view a ser carregada p = listar e p = cadastrar e p=excluir
 */
require "modelConfiguradorBonus.php";

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case "cadastrar":
	cadastrarConfiguradorBonus($conexao);

	break;
case "excluir":

	$retornoExc = inativarConfiguradorBonus($conexao);
	$dados = listarConfiguradorBonus($conexao);
	require "viewListar.php";
	break;

case "alterar":

	alterarConfiguradorBonus($conexao);
	break;

default:
	# listar...
	$dados = listarConfiguradorBonus($conexao);
	require "viewListar.php";
	break;
}

function listarConfiguradorBonus($conexao) {
	$resultado = _listaConfiguradorBonus($conexao);

	$data = array();

	while ($row = mysqli_fetch_array($resultado)) {
		$data[] = array("codigo" => $row["codigo"], "descricao" => $row["descricao"], "valor" => $row["valor"], "nivelHorizontalMax" => $row["nivelHorizontalMax"], "nivelProfundidadeMax" => $row["nivelProfundidadeMax"], "empresa" => $row["empresa"], "status" => $row["status"]);
	}

	return $data;

}

function alterarConfiguradorBonus($conexao) {

	if (isset($_POST['frmAlterarConfiguradorBonus'])) {

		$cpf = $_POST['frmAlterarConfiguradorBonus'];

		//$nome = $_POST['txtNome'];
		//$senha = $_POST['txtSenha'];
		//$tipo = $_POST['txtTipo'];

		//$resultado = _alterarConfiguradorBonusPorCodigo($conexao, $);

		if (!$resultado) {
			echo "Falha ao alterar usuario, cfp :";
			return false;
		} else {

			$retornoExc = "Usuario alterado com sucesso!";
			$dados = listarConfiguradorBonus($conexao);
			require "viewListar.php";
		}

	} else {
		$cpf = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;
		$resultado = _obterConfiguradorBonusPorCodigo($conexao, $cpf);

		if (!$resultado) {
			echo "Falha em buscar usuario por cfp :" . $cpf;
			return false;
		} else {
			$dados = mysqli_fetch_assoc($resultado);
			require "viewAlterar.php";
		}
	}

}

function inativarConfiguradorBonus($conexao) {

	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;
	$status = (isset($_GET["status"])) ? $_GET["status"] : -1;
	if ($status == "1") {
		$vStatus = "0";
	} else {
		$vStatus = "1";
	}

	$resultado = _inativarConfiguradorBonus($conexao, $vStatus, $codigo);

	if ($resultado) {
		return "alteração de status efetuada com sucesso!";
	} else {
		return "";
	}
}

function cadastrarConfiguradorBonus($conexao) {
	$titulo = "Cadastrar usuario";
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroConfiguradorBonus'])) {
		//O formulario foi postado

		$descricao = $_POST["txtDescricao"];
		$valor = $_POST["txtValor"];
		$nivelHorizontalMax = $_POST["txtNovelHorizontal"];
		$nivelProfundidadeMax = $_POST["txtProfundidade"];
		$empresa_id = $_POST["empresa"];
		$dataInicial = $_POST["txtDataInicial"];
		$dataFinal = $_POST["txtDataFinal"];
		$status = $_POST["status"];

		if (_cadastrarConfiguradorBonus($conexao, $descricao, $valor, $nivelHorizontalMax, $nivelProfundidadeMax, $empresa_id, $dataInicial, $dataFinal, $status)) {
			$retornoExc = "Usuario cadastrado com sucesso!";
			$dados = listarConfiguradorBonus($conexao);
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