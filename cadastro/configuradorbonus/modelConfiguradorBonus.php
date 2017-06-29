<?php

function _alterarConfiguradorBonusPorCodigo($conexao,) {
	$sql = sprintf(" ", );
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _obterConfiguradorBonusPorCodigo($conexao, $codigo) {
	$sql = sprintf( " = '%s'", $codigp);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _listaConfiguradorBonus($conexao) {
	$sql = "SELECT id,
			       descricao,
			       valor,
			       nivelHorizontalMax,
			       nivelProfundidadeMax,
			       empresa.descricao empresa,
			       status
			FROM configuradorbonus
		inner join empresa on configuradorbonus.Empresa_id = empresa.id ";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _inativarConfiguradorBonus($conexao, $status,$codigo) {

	$sql = sprintf(" update configuradorbonus set status = %s where id = %s",$status, $codigo);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _cadastrarConfiguradorBonus($conexao,  $descricao, $valor, $nivelHorizontalMax,						      	                                            $nivelProfundidadeMax,$empresa_id,$dataInicial,$dataFinal,$status ) 
{

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
					         , %s); ",$descricao,$valor,$nivelHorizontalMax,$nivelProfundidadeMax,$empresa_id,$dataInicial,$dataFinal);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;

}