<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
    <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./js/funcionario.js"></script>
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

 <div id="mensagem">

        </div>

	<h1>Formulario de cadastro de usuario</h1>

	<form method="POST" action="index.php?r=cadastro/funcionario&p=cadastrar">

		<p>Nome do usuario :</p>
		<p><input type="text" maxlength="200" name="txtNome"></p>

		<select name="usuario" id="usuario">
			<option>Default</option>
        </select>

		<select name="cargo" id="cargo">
			<option>Default</option>
        </select>


        <select name="empresa" id="empresa">
			<option>Default</option>
        </select>


		<input type="submit" name="Cadastrar funcionario">
		<input type="hidden" name="formularioCadastroFuncionario">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>