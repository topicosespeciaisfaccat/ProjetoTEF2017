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
		<?php include "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->
		<div class="conteudo">
			<section>
				<div class="home">


	<!-- INICIO DE CORPO DO SITE -->
			<form method="POST" action="./dashboard/index.php" id="dashboard">
				<?php if (isset($retornoExc)) {?>
					<h1><?=$retornoExc?></h1>

				<?php }?>


					 <div class="wrapperadmin">
			       		<div>
							<h3><div class="inner-dash">
							<input type="submit" class="Dashboard" name="Empresa" value="Empresa" />
							</div></h3>
						</div>

						<div>
							<h3><div class="inner-dash">
							<input type="submit" class="Dashboard" name="Funcionario" value="Funcionários" />
							</div></h3>
						</div>

						<div>
							<h3><div class="inner-dash">
							<input type="submit" class="Dashboard" name="Usuario" value="Usuários" />
							</div> </h3>
							 <input type="hidden" name="formularioDashboard">
						</div>

						<div>
							<h3> <div class="inner-dash">
								<input type="submit" class="Dashboard" name="Vendas" value="Vendas" />
							</div></h3>
						</div>
						<div>
							<h3> <div class="inner-dash">
								<input type="submit" class="Dashboard" name="ConfiguradorDeBonus" value="Configurador De Bonus" />
							</div></h3>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php include "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>