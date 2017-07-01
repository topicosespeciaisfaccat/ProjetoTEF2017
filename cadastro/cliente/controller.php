<?php
require "viewbonus.php";

if (!isset($_COOKIE["tipoUsuario"]) && $_COOKIE["tipoUsuario"] != "Administrador") {

	header("location : ");
	exit();
}

if (mysqli_connect_errno($conexao)) {

	echo "Não possivel conectar na base de dados " . mysqli_connect_errno($conexao);
}

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case 'cadastro':
	cadstroCliente($conexao);
	break;

case 'excluir':
	inativarCliente($conexao);
	break;

case 'alterar':
	inativarCliente($conexao);
	break;

default:
	$dados = listarCliente($conexao);
	require "viewListar.php";
	break;
}

function cadastroCliente($conexao) {
	if (isset($_POST["formularioCadastroCliente"])) {

	} else {

	}
}

function inativarCliente($conexao) {
	if (isset($_GET["codigo"])) {

	} else {

	}
}

function alterarCliente($conexao) {
	if (isset($_POST["formularioCadastroCliente"])) {

	} else {

	}
}

function listarCliente($conexao) {

}