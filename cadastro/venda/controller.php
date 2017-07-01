<?php

if (!isset($_COOKIE['tipoUsuario']) && $_COOKIE['tipoUsuario'] != 'Administrador') {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

if (mysqli_connect_errno($conexao)) {
	echo "Problema ao se conectar ao banco de dados " . mysqli_connect_errno($conexao);
	exit();
}

require "modelVenda.php";

if (isset($_GET['p'])) {
	$passo = $_GET['p'];
} else {
	$passo = null;
}

switch ($passo) {
case 'cadastrar':
	cadastrarVenda($conxao);
	break;

default:
	$dados = listarVenda($conexao);
	require "viewListar.php";
	break;
}

function cadastrarVenda($conexao) {

	if (isset($_POST['formularioCadastroVenda'])) {

	} else {

		$dados = listarVenda($conxao);
		require "viewListar.php";
	}

}

function listaVenda($conexao) {

}