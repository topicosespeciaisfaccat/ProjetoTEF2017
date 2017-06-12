<?php
$titulo = "Login indica bonus";

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

			if (isset($row[3]) && $row[3] == "Administrador") {

				setcookie("usuario", $row[2], time() + 3600); /*Uma hora de cookie */
				setcookie("tipoUsuario", $row[3], time() + 3600);

				header("Location: /ProjetoTEF2017/index.php?r=dashboard");

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