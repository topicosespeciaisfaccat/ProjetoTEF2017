<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
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


					<form method="POST" action="index.php">
						<?php if (isset($retornoExc)) {?>
							<h1><?=$retornoExc?></h1>

						<?php }?>
			
							<div class="wrapper">
								<div class="email">
									<h3>Email</h3>
									<input type="email="" name="txtEmail"  placeholder="email@..." pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" required > <br>
								</div>
								<div class="senha">
									<h3>Senha</h3>
									<input type="password" name="txtSenha" >
									<br>
								</div>
								<div class="logar">
									      <!--a class="btn" href="#" type="submit">Logar</a>-->
									<input type="submit" name="Login usuario" value="Logar">
									<input type="hidden" name="formularioLogin">
								    
								</div>
							</div>

					</form>

				    <!-- FIM DE CORPO DO SITE -->
				</div>
			</section>
		</div>

 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>