<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">

<!-- INICIO DE CABEÇALHO -->
	<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->

	<div class="conteudo">
		<section>
			<div class="home">	
				<div class="wrapperform">

					<h1>Formulario de alteração de usuário</h1>

					<form method="POST" action="index.php?r=cadastro/usuario&p=alterar" name="AlterarUsuario">

						<p>Nome do usuário :</p>
						<p><input type="text" maxlength="200" name="txtNome" value="<?=$dados['nome']?>" ></p>
						<p>Senha :</p>
						<p><input type="text" maxlength="20" name="txtSenha" value="<?=$dados['senha']?>"></p>
						<p>Tipo :</p>
						<p><input type="text" name="txtTipo" value="1" value="<?=$dados['tipoUsuario_id']?>"></p>


						<input type="submit" name="Cadastrar usuario">
						<input type="hidden" name="frmAlterarUsuario" value="<?=$dados['cpf']?>">
					</form>
				</div>
			</div>
		</section>
	</div>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>