<?php
$titulo = "Login indica bonus";

$conexao = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($conexao)) {
	echo "A conexao falhor, erro : " . mysqli_connect_errno();
	exit();
}

require "modelUsuario.php";

if (isset($_POST['formularioLogin'])) {
	obtemUsuario($conexao);
}

function obtemUsuario($conexao) {

	if (isset($_POST['formularioLogin'])) {

		$email = $_POST['txtEmail'];
		$senha = $_POST['txtSenha'];

		if (isset($email) && isset($senha)) {

			$resultado = _obterUsuario($conexao, $email, $senha);
			$data = array();

			$row = $resultado->fetch_array(MYSQLI_NUM);

			if (isset($row[3]) && $row[3] == "administrador") {

				setcookie("usuario", $row[2], time() + 60 * 60 * 24 * 30);
				setcookie("tipoUsuario", $row[3], time() + 60 * 60 * 24 * 30);

				header("Location: ./dashboard/index.php");

			} else {

				$retornoExc = "Usuario não tem acesso de administrador!" . printf($data["tipo"]);
				header("Location: /ProjetoTEF2017/acessoNegado.php");
			}

		} else {
			$retornoExc = "Usuario cadastrado com sucesso!";
			require "view.php";
		}

	}

}

/*
$r = "cadastro/usuario";
require_once $r . "/index.php";
 */