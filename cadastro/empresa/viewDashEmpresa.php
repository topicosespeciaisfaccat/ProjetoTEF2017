<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
</head>
<body class="center clearfix">
    <!-- INICIO DE CABEÇALHO -->
		<?php require "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->


	<!-- INICIO DE CORPO DO SITE -->
			<div class="conteudo">
			<section>
				<div class="home">	
	<form method="POST" action="./cadastro/empresa/index.php">
		<?php if (isset($retornoExc)) {?>
			<h1><?=$retornoExc?></h1>

		<?php }?>
			 <div class="wrapperadmin">

				<div style="float: left; width:30%; height:30%; background: #00aaaa;  border: 2px; border-radius: 9px; margin:0;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash">

					<a href="index.php?r=cadastro/empresa&p=cadastrar" title="Empresa">Cadastrar</a></div></h3>
				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px;margin:1 ;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash">

					<a href="index.php?r=cadastro/empresa&p=listar" title="Listar Empresa">Listar</a></div> </h3>
				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px; margin:1;margin-left:4%;	padding:20px;">
					<h3> <div class="inner-dash">Pesquisar</div></h3>
				</div>
			</div>
		</section>
	</form>

</div>
</section>
</div>
    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>