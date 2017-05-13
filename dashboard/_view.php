<!DOCTYPE html>
<html>
	<meta charset="utf-8">
<head>
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="/layout/css/estilo.css">
</head>
<body>
 <!-- INICIO DE CABEÇALHO -->
		<?php require_once "/layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->
<!-- INICIO DE CORPO DO SITE -->
	<form method="POST" action="index.php">

		<section class="chamada" >
			 <div class="wrapper">
				<div class="inner-dash"><a href="#" title="Empresas"></div>
				<div class="inner-dash"><a href="/ProjetoTEF2017/index.php?r=cadastro/usuario" title="Usuários"></div>
				<div class="inner-dash"><a href="#" title="Podutos"></div>
				<div class="inner-dash"><a href="#" title="Configurações"></div>
				<div class="inner-dash"><a href="#" title="Vendas"></div>
			</div>
		</section>
	</form>

    <!-- FIM DE CORPO DO SITE -->


<!-- INICIO DE RODAPÉ -->
		<?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->

</body>
</html>