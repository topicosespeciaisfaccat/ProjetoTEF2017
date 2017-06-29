<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
  <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="./js/funcionario.js"></script>
  <script type="text/javascript" src="./js/jquery-ui-1.10.3.custom.min.js"></script>

</head>
<body class="center clearfix">
 <!-- INICIO DE CABEÇALHO -->


<!-- INICIO DE CABEÇALHO -->
  <?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->

  <div class="conteudo">
    <section>
      <div class="home">
        <div class="wrapperform">
        	<h1>Formulario de alteração de funcionario</h1>

        	<form method="POST" action="index.php?r=cadastro/funcionario&p=alterar" name="AlterarUsuario">

        		<p>funcionario :</p>
        		<p><input type="text" maxlength="20" name="txtUsuario" value="<?=$dados['funcionario']?>"></p>


        		<select name="cargo" id="cargo">
        			<option>Default</option>
                </select>


                <select name="empresa" id="empresa">
        			<option>Default</option>
                </select>

        		<input type="submit" name="Cadastrar funcionario">
        		<input type="hidden" name="frmAlterarUsuario" value="<?=$dados['codigo']?>">
        	</form>
        </div>
      </div>
    </section>
  </div>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>