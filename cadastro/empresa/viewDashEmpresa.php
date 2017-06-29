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
	<form method="POST" action="./cadastro/empresa/index.php" id="dashbord">

		<?php if (isset($retornoExc)) {?>
			<h1><?=$retornoExc?></h1>

		<?php }?>
			 <div class="wrapperadmin">

				<div>
					<h3><div class="inner-dash">
					<input type="submit" class="Dashboard" name="CadastroEmpresa" value="Cadastro Empresa" >

					<!--<a href="index.php?r=cadastro/empresa&p=cadastrar" title="Empresa">Cadastrar</a>-->

					</div></h3>
				</div>
				<div>
					<h3><div class="inner-dash">

					<input type="submit" class="Dashboard" name="ListaEmpresa" value="Lista Empresa">

					<!--<a href="index.php?r=cadastro/empresa&p=listar" title="Listar Empresa">Listar</a>-->

					<input type="hidden" name="formularioDashboard">
					</div> </h3>
				</div>
<<<<<<< HEAD
				<div>
					<h3>
						 <input type="submit" class="Dashboard" name="Pesquisar" value="Pesquisar">
						<!--<div class="inner-dash">Pesquisar</div>-->

					</h3>
				</div>

=======
				
>>>>>>> a0c68b1018ebf46f30afb2076104e42d80dc77fd
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