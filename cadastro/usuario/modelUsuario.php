<?php

function _listaUsuario($conexao) {
	$sql = "SELECT cpf, email, nome, descricao, tipo
	          from usuario
	         join tipoUsuario on usuario.tipoUsuario = tipoUsuario.id
	          order by nome";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _excluirUsuario($conexao, $codigo) {

	$sql = sprintf("DELETE FROM usuario WHERE cpf = %s", $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _cadastrarUsuario($conexao, $cpf, $nome, $email, $senha, $tipo) {

	$sql = sprintf("INSERT INTO usuario(cpf,nome,email,senha,tipoUsuario)
		                 VALUES (%s,'%s','%s','%s',%s)", $cpf, $nome, $email, $senha, $tipo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;

}