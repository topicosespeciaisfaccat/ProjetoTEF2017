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
			<td>Cpf</td>
			<td>Email</td>
			<td>Nome</td>
			<td>Tipo de usuario</td>
			<td>----</td>
			<td>----</td>
		</tr>
		<?php foreach ($dados as $linha) {?>
		<tr>
			<td><?=$linha["cpf"]?> </td>
			<td><?=$linha["email"]?> </td>
			<td><?=$linha["nome"]?> </td>
			<td><?=$linha["tipo"]?> </td>


			<td><a href="index.php?r=cadastro/usuario&p=excluir&codigo=<?=$linha["cpf"]?>" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a></td>
			<td><a href="index.php?r=cadastro/usuario&p=alterar&codigo=<?=$linha["cpf"]?>">Alterar</a></td>
		</tr>

		<?php }?>
	</table>
	<a href="/ProjetoTEF2017/index.php?r=cadastro/usuario&p=cadastrar"> Cadastrar novo usuario</a>

	<!-- INICIO DE RODAPÉ -->
	  <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ -->
</body>
</html>