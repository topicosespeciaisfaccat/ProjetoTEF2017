<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">
     <!-- INICIO DE CABEÇALHO -->
	<header>
      <h1><a href="dashboard/index.php" title="Sistema de bonificação de postos"><span></span></a></h1>
        <nav>
            <ul>
                <li><a href="#">contato</a></li>
            </ul>
        </nav><!-- fim nav -->
    </header><!-- fim header -->
    <!-- FIM DE CABEÇALHO -->


	<?php if (isset($_COOKIE['usuario'])) {?>

		<h1>Bem vindo <?=$_COOKIE['usuario']?>, abaixo listagem de usuarios :</h1>

	<?php }?>



	<?php if (isset($retornoExc)) {?>
		<h1><?=$retornoExc?></h1>

	<?php }?>


	<table border="1">
		<tr>
			<td>codigo</td>
			<td>cargo</td>
			<td>Empresa</td>
			<td>funcionario</td>
			<td>cpf</td>
			<td>----</td>
			<td>----</td>
		</tr>
		<?php foreach ($dados as $linha) {?>
		<tr>
			<td><?=$linha["codigo"]?> </td>
			<td><?=$linha["cargo"]?> </td>
			<td><?=$linha["empresa"]?> </td>
			<td><?=$linha["funcionario"]?> </td>
			<td><?=$linha["cpf"]?> </td>


			<td><a href="index.php?r=cadastro/funcionario&p=excluir&codigo=<?=$linha["codigo"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
			<td><a href="index.php?r=cadastro/funcionario&p=alterar&codigo=<?=$linha["codigo"]?>">Alterar</a></td>
		</tr>

		<?php }?>
	</table>
	<a href="/ProjetoTEF2017/index.php?r=cadastro/funcionario&p=cadastrar"> Cadastrar novo usuario</a>

	<!-- INICIO DE RODAPÉ -->
	  <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>