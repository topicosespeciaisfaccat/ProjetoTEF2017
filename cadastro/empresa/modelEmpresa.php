<?php

function _listaEmpresa($conexao) {
	$sql = "select e.id, e.descricao, g.descricao as grupo from empresa e join grupoempresa g on e.grupoempresa_id=g.id";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _excluirUsuario($conexao, $codigo) {

	$sql = sprintf("DELETE FROM usuario WHERE cpf = %s", $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _cadastrarEmpresa($conexao, $nome, $idgrupoempresa) {

	$sql = "INSERT INTO empresa (id, descricao, GrupoEmpresa_id)
		                 VALUES (NULL,'$nome','$idgrupoempresa')";
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

function _excluirEmpresa($conexao, $codigo) {

	$sql = sprintf("DELETE FROM empresa WHERE id = %s", $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}
