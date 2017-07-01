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

						<h1>Bem vindo <?=$_COOKIE['usuario']?>, abaixo listagem de venda de produto :</h1>

					<?php }?>



					<?php if (isset($retornoExc)) {?>
						<h1><?=$retornoExc?></h1>

					<?php }?>


					<table class="tabelalista">
						<tr class="indicetabela">
							<td>Cpf</td>
							<td>Email</td>
							<td>Nome</td>
							<td>Tipo de usuario</td>
							<td>----</td>
							<td>----</td>
						</tr>
						<?php foreach ($dados as $linha) {?>
						<tr class="dadostabela">
							<td><?=$linha["cpf"]?> </td>
							<td><?=$linha["email"]?> </td>
							<td><?=$linha["nome"]?> </td>
							<td><?=$linha["tipo"]?> </td>


							<td class="excluirtabela"><a href="index.php?r=cadastro/vendaProduto&p=excluir&codigo=<?=$linha["cpf"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
							<td class="excluirtabela"><a href="index.php?r=cadastro/vendaProduto&p=alterar&codigo=<?=$linha["cpf"]?>">Alterar</a></td>
						</tr>

						<?php }?>
					</table>
					<div class="linkbotao">
					<a href="/ProjetoTEF2017/index.php?r=cadastro/vendaProduto&p=cadastrar"> Cadastrar novo usuario</a>
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