<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
</head>
<body class="center clearfix">
 <!-- INICIO DE CABEÇALHO -->

	   <?php require "./layout/header.php";?>


	<h1>Formulario de cadastro de empresa</h1>

	<form method="POST" action="index.php?r=cadastro/empresa&p=btncadastrar">

		<p>Nome da Empresa:</p>
		<p><input type="text" maxlength="11" minlength="11" name="txtNome"></p>
		<p>Empresa do Grupo :</p>
		
		<select name="grupoempresa">
			<?php foreach ($dadosgrupo as $linha) {?>
		   	<option value="<?=$linha['id'] ?>"><?=$linha['descricao'] ?></option>
		    <?php }?>
        </select>

		<input type="submit" name="CadastrarEmpresa">
		<input type="hidden" name="formularioCadastroEmpresa">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require"./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>