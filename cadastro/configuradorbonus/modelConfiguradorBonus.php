<?php

function _alterarConfiguradorBonusPorCodigo($conexao, $codigo) {
	$sql = sprintf(" ", $codigo);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _obterConfiguradorBonusPorCodigo($conexao, $codigo) {
	$sql = sprintf(" = '%s'", $codigp);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _listaConfiguradorBonus($conexao) {
	$sql = "SELECT configuradorbonus.id codigo,
				   configuradorbonus.descricao,
				    configuradorbonus.valor,
				    configuradorbonus.nivelHorizontalMax,
				    configuradorbonus.nivelProfundidadeMax,
				    configuradorbonus.Empresa_id,
				    configuradorbonus.dataInicial,
				    configuradorbonus.dataFinal,
				    configuradorbonus.status,
				    empresa.descricao empresa
				FROM meuazuresql.configuradorbonus
				inner join meuazuresql.empresa on empresa.id = configuradorbonus.Empresa_id ";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _inativarConfiguradorBonus($conexao, $status, $codigo) {

	$sql = sprintf(" update configuradorbonus set status = %s where id = %s", $status, $codigo);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _cadastrarConfiguradorBonus($conexao, $descricao, $valor, $nivelHorizontalMax, $nivelProfundidadeMax, $empresa_id, $dataInicial, $dataFinal, $status) {

	$sql = sprintf(" INSERT INTO configuradorbonus(
							     descricao,
							     valor,
							     nivelHorizontalMax,
							     nivelProfundidadeMax,
							     Empresa_id,
							     dataInicial,
							     dataFinal,
							     status)
					   VALUES (%s
					         , %s
					         , %s
					         , %s
					         , %s
					         , %s
					         , %s
					         , %s); ", $descricao, $valor, $nivelHorizontalMax, $nivelProfundidadeMax, $empresa_id, $dataInicial, $dataFinal);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;

}