<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">
    <!-- INICIO DE CABEÇALHO -->
	    <!-- INICIO DE CABEÇALHO -->
	<header>
      <h1><a href="#" title="Sistema de bonificação de postos"><span></span></a></h1>
        <nav>
            <ul>
                <li><a href="#">contato</a></li>
            </ul>
        </nav><!-- fim nav -->
    </header><!-- fim header -->
    <!-- FIM DE CABEÇALHO -->


	<!-- INICIO DE CORPO DO SITE -->
	<form method="POST" action="index.php">
		<?php if (isset($retornoExc)) {?>
			<h1><?=$retornoExc?></h1>

		<?php }?>

		<section class="chamada" >
			 <div class="wrapper">
				<div style="float: left; width:15%; ">
					<h3>Email</h3>
					<h3>Senha<h3>
				</div>
				<div style="float: left; width: 35%">
					<h3> <input type="email="" name="txtEmail"  placeholder="email@..." pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" required > </h3>
					<h3> <input type="password" name="txtSenha" > </h3>
				</div>
				<div style="float: left; width:10%; ">
					 <span>
					      <!--a class="btn" href="#" type="submit">Logar</a>-->
					     <input type="submit" name="Login usuario">
						 <input type="hidden" name="formularioLogin">
				      </span>
				</div>
			</div>
		</section>
	</form>

    <!-- FIM DE CORPO DO SITE -->


 	<!-- INICIO DE RODAPÉ -->
		<?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>