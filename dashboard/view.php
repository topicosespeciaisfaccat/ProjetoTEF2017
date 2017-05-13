<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="../layout/css/estilo.css">
</head>
<body class="center clearfix">
    <!-- INICIO DE CABEÇALHO -->
		<?php require_once "../layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->


	<!-- INICIO DE CORPO DO SITE -->
	<form method="POST" action="./dashboard/index.php">
		<?php if (isset($retornoExc)) {?>
			<h1><?=$retornoExc?></h1>

		<?php }?>

		<section class="chamada" >
			 <div class="wrapper">

				<div style="float: left; width:30%; height:30%; background: #00aaaa;  border: 2px; border-radius: 9px; margin:0;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash"><a href="#" title="Empresa">Empresa</div></h3>

				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px;margin:1 ;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash"><a href="/ProjetoTEF2017/index.php?r=cadastro/usuario" title="Usuários">Usuario</div> </h3>
				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px; margin:1;margin-left:4%;	padding:20px;">
					<h3> <div class="inner-dash"><a href="#" title="Vendas">Vendas</div></h3>
				</div>
			</div>
		</section>
	</form>

    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "../layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>