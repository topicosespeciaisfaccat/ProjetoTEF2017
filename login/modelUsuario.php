<?php

function _obterUsuario($conexao, $email, $senha) {
	$sql = sprintf("SELECT cpf, email, nome, descricao  tipo
	          from usuario
	         join tipoUsuario on usuario.tipoUsuario = tipoUsuario.id
	         where usuario.email ='%s'
	           and usuario.senha ='%s'", $email, $senha);

	$resultado = mysqli_query($conexao, $sql);

	return $resultado;
}
