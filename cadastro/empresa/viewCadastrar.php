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
		<!--<p>ID da Empresa:</p>
		<p><input type="text" maxlength="11" minlength="1" name="txtId"></p>-->
		<p>Nome da Empresa:</p>
		<p><input type="text" maxlength="11" minlength="1" name="txtNome"></p>
		<p>Empresa do Grupo :</p>
		<select name="idgrupoempresa">
			<?php foreach ($dadosgrupo as $linha) {?>
		   	<option value="<?=$linha['id'] ?>"><?=$linha['descricao'] ?></option>
		    <?php }?>
        </select>


		<input type="submit" name="Cadastrar Empresa">
		<input type="hidden" name="formularioCadastroEmpresa">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require"./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>