<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="./layout/css/estilo.css">
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

	   <?php require "./layout/header.php";?>
    <div class="conteudo">
        <section>
            <div class="home">  
                <div class="wrapperform">  


                	<h1>Formulario de cadastro de empresa</h1>

                	<form method="POST" action="index.php?r=cadastro/empresa&p=btncadastrar">
                		<!--<p>ID da Empresa:</p>
                		<p><input type="text" maxlength="11" minlength="1" name="txtId"></p>-->
                		<p>Nome da Empresa:</p>
                		<p><input type="text" maxlength="11" minlength="1" name="txtNome"></p>
                		<p>Empresa do Grupo :</p>
                		<select name="idgrupoempresa">
                			<?php foreach ($dadosgrupo as $linha) {?>
                		   	<option value="<?=$linha['id'] ?>"><?=$linha['descricao'] ?></option>
                		    <?php }?>
                    </select>


                     		<input type="submit" name="Cadastrar Empresa">
                     		<input type="hidden" name="formularioCadastroEmpresa">
                 	</form>
                </div>
            </div>
        </section>
    </div>
	<!-- INICIO DE RODAPÉ -->
	   <?php require "./layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>