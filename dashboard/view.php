<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
<style>
		input.Dashboard {
		cursor: pointer;
		font-weight: bold;
		font-size: 150%;
		background: #00aaaa;
		color: #fff;
		border: 0px ;
		border-radius: 10px;
		-moz-box-shadow:: 6px 6px 5px #999;
		-webkit-box-shadow:: 6px 6px 5px #999;
		box-shadow:: 6px 6px 5px #999;
		}

		input.Dashboard:hover {
		color: #ffff00;
		}
 </style>

</head>
<body class="center clearfix">
    <!-- INICIO DE CABEÇALHO -->
		<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->


	<!-- INICIO DE CORPO DO SITE -->
	<form method="POST" action="./dashboard/index.php" id="dashboard">
		<?php if (isset($retornoExc)) {?>
			<h1><?=$retornoExc?></h1>

		<?php }?>

		<section class="chamada" >
			 <div class="wrapper">
	       <div style="float: left; width:30%; height:30%; background: #00aaaa;  border: 2px; border-radius: 9px; margin:0;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash">
					<input type="submit" class="Dashboard" name="Empresa" value="empresa" />

					</div></h3>
				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px;margin:1 ;margin-left:4%;	padding:20px;">
					<h3><div class="inner-dash">
					<input type="submit" class="Dashboard" name="Usuario" value="Usuarios" />

					</div> </h3>


					 <input type="hidden" name="formularioDashboard">


				</div>
				<div style="float: left; width:30%; height:30%; background: #00aaaa; border: 2px; border-radius: 9px; margin:1;margin-left:4%;	padding:20px;">
					<h3> <div class="inner-dash">
						<input type="submit" class="Dashboard" name="Vendas" value="Vendas" />
					</div></h3>
				</div>
			</div>
		</section>
	</form>

    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>