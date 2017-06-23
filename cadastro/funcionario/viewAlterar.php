<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">
 <!-- INICIO DE CABEÇALHO -->
 <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type="text/javascript">
$(function(){
      var items="";
      $.getJSON("modelFuncionario.php/obterCargo",function(dados){
        $.each(dados,function(index,item)
        {
          items+="<option value='"+item.id+"'>"+item.name+"</option>";
        });
        $("#cargo").html(items);
      });
    });

$(function(){
      var items="";
      $.getJSON("modelFuncionario.php/obterEmpresa",function(dados){
        $.each(dados,function(index,item)
        {
          items+="<option value='"+item.id+"'>"+item.name+"</option>";
        });
        $("#empresa").html(items);
      });
    });
</script>

    <header>
      <h1><a href="dashboard/index.php" title="Sistema de bonificação de postos"><span></span></a></h1>
        <nav>
            <ul>
                <li><a href="#">contato</a></li>
            </ul>
        </nav><!-- fim nav -->
    </header><!-- fim header -->
    <!-- FIM DE CABEÇALHO -->



	<h1>Formulario de alteração de funcionario</h1>

	<form method="POST" action="index.php?r=cadastro/funcionario&p=alterar" name="AlterarUsuario">

		<p>funcionario :</p>
		<p><input type="text" maxlength="20" name="txtUsuario" value="<?=$dados['cargo']?>"></p>


		<select name="cargo" id="cargo">
			<option>Default</option>
        </select>


        <select name="empresa" id="empresa">
			<option>Default</option>
        </select>

		<input type="submit" name="Cadastrar funcionario">
		<input type="hidden" name="frmAlterarUsuario" value="<?=$dados['codigo']?>">
	</form>
	<!-- INICIO DE RODAPÉ -->
	   <?php require_once "/layout/footer.php";?>
   <!-- INICIO DE RODAPÉ <--></-->
</body>
</html>