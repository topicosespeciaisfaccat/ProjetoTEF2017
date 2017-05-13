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



	<h1>Formulario de cadastro de usuario</h1>

	<form method="POST" action="index.php?r=cadastro/usuario&p=cadastrar">
		<p>Cpf:</p>
		<p><input type="text" maxlength="11" minlength="11" name="txtCpf"></p>
		<p>Nome do usuario :</p>
		<p><input type="text" maxlength="200" name="txtNome"></p>
		<p>Email :</p>
		<p><input type="text" maxlength="200" name="txtEmail"></p>
		<p>Senha :</p>
		<p><input type="password" maxlength="20" name="txtSenha"></p>
		<p>Tipo :</p>
		<p><input type="text" name="txtTipo" value="1"></p>


		<input type="submit" name="Cadastrar usuario">
		<input type="hidden" name="formularioCadastroUsuario">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>