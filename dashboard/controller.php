<?php
if (!isset($_COOKIE['tipoUsuario']) && $_COOKIE['tipoUsuario'] != 'Administrador') {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

$titulo = "Login indica bonus";

function get_post_action($name) {
	$params = func_get_args();

	foreach ($params as $name) {
		if (isset($_POST[$name])) {
			return $name;
		}
	}
}

if (isset($_POST['formularioDashboard'])) {
	switch (get_post_action('Empresa', 'Usuario', 'Funcionario', 'ConfiguradorDeBonus')) {
	case 'Empresa':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/empresa&p=dashempresa");
		break;

	case 'Usuario':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/usuario");
		break;

	case 'Funcionario':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/funcionario");
		break;
	case 'ConfiguradorDeBonus':
		header("Location: /ProjetoTEF2017/index.php?r=cadastro/configuradorbonus");
		break;
	default:
//no action sent
	}
}

/*if (isset($_POST['formularioDashboard'])) {

if (isset($_POST['Empresa'])) {
header("Location: /ProjetoTEF2017/index.php?r=cadastro/empresa&p=dashempresa");
}

if (isset($_POST['Usuario'])) {
header("Location: /ProjetoTEF2017/index.php?r=cadastro/usuario");
}

}*/
