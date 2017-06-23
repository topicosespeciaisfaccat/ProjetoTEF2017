<?php

function _alterarFuncionarioPorCodigo($conexao, $cargo_id, $Empresa_id, $codigo) {
	$sql = sprintf("UPDATE funcionario
					   SET cargo_id = '%s'
					      ,Empresa_id = '%s'
					WHERE id =  '%s' ", $cargo_id, $Empresa_id, $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _obterFuncionarioPorCodigo($conexao, $codigo) {
	$sql = sprintf("SELECT funcionario.id codigo,
						   cargo.descricao cargo,
					       empresa.descricao empresa,
					       usuario.nome funcionario,
					       funcionario.Usuario_cpf cpf
					FROM       funcionario
					inner join usuario      on funcionario.usuario_cpf =usuario.cpf
					inner join cargo   		on funcionario.cargo_id = cargo.id
					inner join empresa 		on funcionario.empresa_id = empresa.id
					where funcionario.id =  %s", $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _obterFuncionario($conexao) {
	$sql = "SELECT funcionario.id codigo,
				   cargo.descricao cargo,
				   empresa.descricao empresa,
				   usuario.nome funcionario,
				   funcionario.Usuario_cpf cpf
	   		  FROM     funcionario
			inner join usuario      on funcionario.usuario_cpf =usuario.cpf
			inner join cargo   		on funcionario.cargo_id = cargo.id
			inner join empresa 		on funcionario.empresa_id = empresa.id
			order by usuario.nome";
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _excluirFuncionario($conexao, $codigo) {

	$sql = sprintf("DELETE FROM funcionario WHERE id = %s", $codigo);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}

function _cadastrarFuncionario($conexao, $cargo_id, $empresa_id, $grupo_empresa_id, $usuario_cpf, $tipoUsuario_id) {

	$sql = sprintf("INSERT INTO usuario(cargo_id,Empresa_id,Empresa_GrupoEmpresa_id,Usuario_cpf,Usuario_tipoUsuario_id)
		                 VALUES (%s,'%s','%s','%s',%s)", $cargo_id, $empresa_id, $grupo_empresa_id, $usuario_cpf, $tipoUsuario_id);
	$resultado = mysqli_query($conexao, $sql);

	return $resultado;

}

function _obterCargo($conexao) {

	$sql = sprintf("SELECT id, descricao cargo FROM cargo;");
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _obterEmpresa($conexao) {
	$sql = sprintf("SELECT empresa.id,
					       empresa.descricao,
					       empresa.GrupoEmpresa_id,
					       grupoempresa.descricao
					FROM empresa
					inner join  grupoempresa on empresa.GrupoEmpresa_id = grupoempresa.id");
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function _obterUsuario($conexao, $codigo) {
	$sql = sprintf("SELECT cpf, email, nome, descricao, descricao tipo
			          from usuario
			         join tipoUsuario on usuario.tipoUsuario_id = tipoUsuario.id
			         where cpf = '%s'", $codigo);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}