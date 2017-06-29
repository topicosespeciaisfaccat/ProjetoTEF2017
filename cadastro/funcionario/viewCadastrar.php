<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title>cadastro de funcionario</title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
    <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./js/funcionario.js"></script>
<<<<<<< HEAD
=======
    <script type="text/javascript" src="./js/jquery-ui-1.10.3.custom.min.js"></script>

>>>>>>> a0c68b1018ebf46f30afb2076104e42d80dc77fd

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

                  	<form method="POST" action="index.php?r=cadastro/funcionario&p=cadastrar" >

                  		<!--<p>Nome do usuario :</p>

                         <div id="container">
                               <input type="text" id="search" placeholder="Informe um nome para pesquisa"/>
                               <input type="button" id="button" value="Pesquisar" />
                               <ul id="result"></ul>
                          </div>-->

                  		<select name="usuario" id="usuario">
                  			<option>Usuario</option>
                          </select>

                      <!--<input type="text=" name="usuario" disabled="true" style="width: 200px">-->

                  		<select name="cargo" id="cargo">
                  			<option>Cargo</option>
                          </select>


                          <select name="empresa" id="empresa">
                  			<option>Empresa</option>
                          </select>


<<<<<<< HEAD
                  		<input type="submit" name="Cadastrarfuncionario" value="Cadastrar funcionario">

=======
                  		<input type="submit" name="Cadastrar funcionario" Value="Cadastrar">
>>>>>>> a0c68b1018ebf46f30afb2076104e42d80dc77fd
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