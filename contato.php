<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
<style>

 </style>

</head>
<body class="center clearfix">
    <!-- INICIO DE CABEÇALHO -->
		<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO --> 
	<!-- INICIO DE CORPO DO SITE -->
		<div class="conteudo">
			<section>
				<div class="home">			
					<div class="wrapperform">	
				<?php require_once "./modeloCSS/includes/contato.html";?>
					</div>
			</div>
		</section>
	</div>
    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>