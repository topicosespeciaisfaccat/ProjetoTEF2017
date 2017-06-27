<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">
     <!-- INICIO DE CABEÇALHO -->
     <?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->
	<div class="conteudo">
		<section>
			<div class="home">	
				<div class="wrapperadmin">	
				<?php if (isset($_COOKIE['usuario'])) {?>

					<h1>Bem vindo <?=$_COOKIE['usuario']?>, abaixo listagem de funcionários:</h1>

				<?php }?>



				<?php if (isset($retornoExc)) {?>
					<h1><?=$retornoExc?></h1>

				<?php }?>


				<table class="tabelalista" >
					<tr class="indicetabela">
						<td>codigo</td>
						<td>cargo</td>
						<td>Empresa</td>
						<td>funcionario</td>
						<td>cpf</td>
						<td>----</td>
						<td>----</td>
					</tr>
					<?php foreach ($dados as $linha) {?>
					<tr class="dadostabela">
						<td><?=$linha["codigo"]?> </td>
						<td><?=$linha["cargo"]?> </td>
						<td><?=$linha["empresa"]?> </td>
						<td><?=$linha["funcionario"]?> </td>
						<td><?=$linha["cpf"]?> </td>


						<td class="excluirtabela"><a href="index.php?r=cadastro/funcionario&p=excluir&codigo=<?=$linha["codigo"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
						<td class="excluirtabela"><a href="index.php?r=cadastro/funcionario&p=alterar&codigo=<?=$linha["codigo"]?>">Alterar</a></td>
					</tr>

					<?php }?>
				</table>
				<div class="linkbotao">
				<a href="/ProjetoTEF2017/index.php?r=cadastro/funcionario&p=cadastrar"> Cadastrar novo funcionário</a>
				</div>
			</div>
			</div>
		</section>
	</div>

	<!-- INICIO DE RODAPÉ -->
	  <?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>