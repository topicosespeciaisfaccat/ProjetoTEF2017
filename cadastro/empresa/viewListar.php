<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
</head>
<body class="center clearfix">
     <!-- INICIO DE CABEÇALHO -->
	   <?php require"./layout/header.php";?>


	<?php if (isset($_COOKIE['usuario'])) {?>

		<h1>Bem vindo <?=$_COOKIE['usuario']?>, abaixo listagem das empresas :</h1>

	<?php }?>



	<?php if (isset($retornoExc)) {?>
		<h1><?=$retornoExc?></h1>

	<?php }?>


	<table border="1">
		<tr>
			<td>Id</td>
			<td>Empresa</td>
			<td>Grupo Empresa</td>
		</tr>
		<?php foreach ($dadosempresa as $linha) {?>
		<tr>
			<td><?=$linha['id']?> </td>
			<td><?=$linha['descricao']?> </td>
			<td><?=$linha['grupo']?> </td>


			<td><a href="index.php?r=cadastro/empresa&p=excluir&codigo=<?=$linha["id"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
		</tr>

		<?php }?>
	</table>
	<a href="/ProjetoTEF2017/index.php?r=cadastro/empresa&p=cadastrar"> Cadastrar nova empresa</a>

	<!-- INICIO DE RODAPÉ -->
	   <?php require"./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>