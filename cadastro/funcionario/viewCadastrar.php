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
<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->

    <div class="conteudo">
        <section>
            <div class="home">  
                <div class="wrapperform">  

                   <div id="mensagem">

                          </div>

                  	<h1>Formulario de cadastro de Funcionário</h1>

                  	<form method="POST" action="index.php?r=cadastro/funcionario&p=cadastrar">

                  		<p>Nome do usuario :</p>

                         <div id="container">
                               <input type="text" id="search" placeholder="Search Tutorials Here... Ex: Java, Php, Jquery..."/>
                               <input type="button" id="button" value="Search" />
                               <ul id="result"></ul>
                          </div>

                  		<select name="usuario" id="usuario">
                  			<option>Default</option>
                          </select>

                  		<select name="cargo" id="cargo">
                  			<option>Default</option>
                          </select>


                          <select name="empresa" id="empresa">
                  			<option>Default</option>
                          </select>


                  		<input type="submit" name="Cadastrar funcionario" Value="Cadastrar">
                  		<input type="hidden" name="formularioCadastroFuncionario">
                  	</form>
                  </div>
                </div>
              </section>
            </div>

	<!-- INICIO DE RODAPÉ -->
	  <?php require_once "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>