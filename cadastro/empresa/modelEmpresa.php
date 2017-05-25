<?php

function _listaEmpresa($conexao) {
	$sql = "SELECT cpf, email, nome, descricao  tipo
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

function _cadastrarEmpresa($conexao, $nome, $grupoempresa) {

	$sql = sprintf("INSERT INTO empresa(id, descricao, idgrupoempresa)
		                 VALUES ('', %s,%s)", $nome, $grupoempresa);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;

}

function _listaGrupoEmpresa($conexao){
	$sql = "SELECT id, descricao
	          from grupoempresa
	          order by descricao";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}