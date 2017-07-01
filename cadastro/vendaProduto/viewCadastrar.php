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

					<h1>Formulario de cadastro venda produto</h1>

					<form method="POST" action="index.php?r=cadastro/vendaProduto&p=cadastrar">
						<p>CPF:</p>
						<p><input type="text" maxlength="11" minlength="11" name="txtCpf"></p>
						<p>Nome do usuário:</p>
						<p><input type="text" maxlength="200" name="txtNome"></p>
						<p>E-mail:</p>
						<p><input type="email" maxlength="200" name="txtEmail" placeholder="email@..."></p>
						<p>Senha:</p>
						<p><input type="password" maxlength="20" name="txtSenha"></p>
						<p>Tipo:</p>
						<p><input type="text" name="txtTipo" value="1"></p>


						<input type="submit" name="Cadastrar venda">
						<input type="hidden" name="formularioCadastroVendaProduto">
					</form>
			</div>
		</div>
	</section>
</div>

	<!-- INICIO DE RODAPÉ -->
	<?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>