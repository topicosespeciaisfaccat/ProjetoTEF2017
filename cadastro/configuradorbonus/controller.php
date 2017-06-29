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

	$retornoExc = excluirConfiguradorBonus($conexao);
	$dados = listarConfiguradorBonus($conexao);
	require "viewListar.php";
	break;

case "alterar":

	alterarConfiguradorBonus($conexao);
	break;

default:
	# listar...
	$dados = listarUsuario($conexao);
	require "viewListar.php";
	break;
}

function listarConfiguradorBonus($conexao) {
	$resultado = _listaConfiguradorBonus($conexao);

	$data = array();
	$data = mysqli_fetch_assoc($resultado);	

	return $data;

}

function alterarConfiguradorBonus($conexao) {

	if (isset($_POST['frmAlterarConfiguradorBonus'])) {

		$cpf = $_POST['frmAlterarConfiguradorBonus'];
		
		//$nome = $_POST['txtNome'];
		//$senha = $_POST['txtSenha'];
		//$tipo = $_POST['txtTipo'];

		$resultado = _alterarConfiguradorBonusPorCodigo($conexao, $);

		if (!$resultado) {
			echo "Falha ao alterar usuario, cfp :" . $cpf;
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

	$resultado = _inativarConfiguradorBonus($conexao, $codigo);

	if ($resultado) {
		return "Exclusão efetuada com sucesso!";
	} else {
		return "";
	}
}

function cadastrarConfiguradorBonus($conexao) {
	$titulo = "Cadastrar usuario";
	//verificar se o formulario foi postado
	if (isset($_POST['formularioCadastroConfiguradorBonus'])) {
		//O formulario foi postado
		//

		if (_cadastrarConfiguradorBonus($conexao, $)) {
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