<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
	    <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./js/funcionario.js"></script>

    <script type="text/javascript" src="./js/jquery-ui-1.10.3.custom.min.js"></script>
</head>
<body class="center clearfix">
 <!-- INICIO DE CABEÇALHO -->
	<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->

	<div class="conteudo">
		<section>
			<div class="home">
				<div class="wrapperform">

					<h1>Formulario de cadastro de usuario</h1>

					<form method="POST" action="index.php?r=cadastro/configuradorbonus&p=cadastrar">
						<p>Descrição:</p>
						<p><input type="text" maxlength="11" minlength="11" name="txtDescricao"></p>
						<p>Valor:</p>
						<p><input type="text" maxlength="200" name="txtValor"></p>
						<p>Nivel horizontal:</p>
						<p><input type="text" maxlength="200" name="txtNovelHorizontal"></p>
						<p>Nivel Profundidade:</p>
						<p><input type="text" maxlength="20" name="txtProfundidade"></p>
						<p>Data Inicial:</p>
						<p><input type="date"  max="1979-12-31"  min="2000-01-02"  name="txtDataInicial"></p>
						<p>Data Final:</p>
						<p><input type="date"  max="1979-12-31"  min="2000-01-02"  name="txtDataFinal"></p>
						<p>Status:</p>
						<p><select name="status" id="status">
								<option value="0">Status</option>
								<option value="0">Inativo</option>
								<option value="1">Ativo</option>
						</select></p>

						<p><select name="empresa" id="empresa">
								<option value="0">Empresa</option>
						</select></p>

						<input type="submit" name="Cadastrar usuario">
						<input type="hidden" name="formularioCadastroConfiguradorBonus">
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