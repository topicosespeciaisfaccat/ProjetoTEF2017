<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
    <script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./js/funcionario.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-1.10.3.custom.min.js"></script>

<style type="text/css">
            #container{
               width:800px;
               margin:0 auto;
            }

            #search{
               width:700px;
               padding:10px;
            }

            #button{
               display: block;
               width: 100px;
               height:30px;
               border:solid #366FEB 1px;
               background: #91B2FA;
            }

            ul{
                margin-left:-40px;
            }

            ul li{
                list-style-type: none;
                border-bottom: dotted 1px black;
              height: 50px;
            }

            li:hover{
                background: #A592E8;
            }

            a{
                text-decoration: none;
              font-size: 18px;
            }
        </style>
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


		<input type="submit" name="Cadastrar funcionario">
		<input type="hidden" name="formularioCadastroFuncionario">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>