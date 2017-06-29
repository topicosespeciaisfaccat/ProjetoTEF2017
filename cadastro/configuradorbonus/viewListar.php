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

						<h1>Bem vindo <?=$_COOKIE['usuario']?>, abaixo listagem de usuarios :</h1>

					<?php }?>



					<?php if (isset($retornoExc)) {?>
						<h1><?=$retornoExc?></h1>

					<?php }?>


					<table class="tabelalista">
						<tr class="indicetabela">
							<td>codigo</td>
							<td>descrição</td>
							<td>Valor</td>
							<td>Nivel Horizontal Max</td>
							<td>Nivel Profundidade Max</td>
							<td>empresa</td>
							<td>Status</td>
						</tr>
						<?php foreach ($dados as $linha) {?>
						<tr class="dadostabela">
							<td><?=$linha["codigo"]?> </td>
							<td><?=$linha["descricao"]?> </td>
							<td><?=$linha["nivelHorizontalMax"]?> </td>
							<td><?=$linha["nivelProfundidadeMax"]?> </td>
						    <td><?=$linha["empresa"]?> </td>
						    <td><?=$linha["status"]?> </td>

							<td class="excluirtabela"><a href="index.php?r=cadastro/configuradorbonus&p=excluir&codigo=<?=$linha["cpf"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
							<td class="excluirtabela"><a href="index.php?r=cadastro/configuradorbonus&p=alterar&codigo=<?=$linha["cpf"]?>">Alterar</a></td>
						</tr>

						<?php }?>
					</table>
					<div class="linkbotao">
					<a href="/ProjetoTEF2017/index.php?r=cadastro/configuradorbonus &p=cadastrar"> Cadastrar novo usuario</a>
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