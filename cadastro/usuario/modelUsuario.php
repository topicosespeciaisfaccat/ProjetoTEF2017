<?php

function _alterarUsuarioPorCodigo($conexao, $cpf, $nome, $senha, $tipo) {
	$sql = sprintf("UPDATE usuario
							SET nome = '%s'
							    ,senha = '%s'
							    ,tipoUsuario_id =%s
							WHERE cpf =  '%s' ", $nome, $senha, $tipo, $cpf);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _obterUsuarioPorCodigo($conexao, $cpf) {
	$sql = sprintf("SELECT cpf,
		                   nome,
		                   senha,
		                   tipoUsuario_id
	                  from usuario
	                 where cpf = '%s'", $cpf);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _listaUsuario($conexao) {
	$sql = "SELECT cpf, email, nome, descricao, descricao tipo
	          from usuario
	         join tipoUsuario on usuario.tipoUsuario_id = tipoUsuario.id
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

	$sql = sprintf("INSERT INTO usuario(cpf,nome,email,senha,tipoUsuario_id)
		                 VALUES (%s,'%s','%s','%s',%s)", $cpf, $nome, $email, $senha, $tipo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;

}