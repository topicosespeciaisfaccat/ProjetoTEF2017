

<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title>Acesso negado ao sistema!</title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">
<!-- INICIO DE CABEÇALHO -->
	    <!-- INICIO DE CABEÇALHO -->
		<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->


	<!-- INICIO DE CORPO DO SITE -->
		<div class="conteudo">
			<section>
				<div class="home">		
					<form method="POST" >
						<?php if (isset($retornoExc)) {?>
							<h1><?=$retornoExc?></h1>
						<?php }?>

							 <div class="wrapperadmin">
								<div style="float: left; width:15%; ">

								</div>
								<div style="float: left; width: 35%">
									<h1> Acesso negado ao usuario!</h1>
								</div>
								<div style="float: left; width:10%; ">

								</div>
							</div>
					</form>
				</div>
			</section>
		</div>
    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>