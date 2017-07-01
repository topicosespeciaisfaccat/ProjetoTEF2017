<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<link rel="stylesheet" type="text/css" href="layout/css/estilo.css">
</head>
<body class="center clearfix">

<!-- INICIO DE CABEÇALHO -->
	<?php require_once "./layout/header.php";?>
    <!-- FIM DE CABEÇALHO -->

	<div class="conteudo">
		<section>
			<div class="home">
				<div class="wrapperform">

					<h1>Formulario de alteração de usuário</h1>

					<form method="POST" action="index.php?r=cadastro/usuario&p=alterar" name="AlterarUsuario">

					    <p>Descrição de bonus :</p>
						<p><input type="text" maxlength="50" minlength="11" name="txtDescricao"  value="<?=$dados['descricao']?>" ></p>
						<p>Valor:</p>
						<p><input type="text" maxlength="20" name="txtValor" value="<?=$dados['valor']?>"></p>
						<p>Nivel horizontal:</p>
						<p><input type="text" maxlength="200" name="txtNovelHorizontal" value="<?=$dados['NivelProfundidadeMax']?>"></p>
						<p>Nivel Profundidade:</p>
						<p><input type="text" maxlength="20" name="txtProfundidade" value="<?=$dados['DataInicial']?>"></p>
						<p>Data Inicial:</p>
						<p><input type="date"  max="2099-12-31"  min="2017-01-02"  name="txtDataInicial" value="<?=$dados['DataInicial']?>"></p>
						<p>Data Final:</p>
						<p><input type="date"  max="2099-12-31"  min="2017-01-02"  name="txtDataFinal" value="<?=$dados['DataInicial']?>"></p>
						<p>Status:</p>
						<p><select name="status" id="status">
								<option value="0">Status</option>
								<option value="0">Inativo</option>
								<option value="1">Ativo</option>
						</select></p>
						<p>Empresa:</p>
						<p><select name="empresa" id="empresa">
								<option value="0">Empresa</option>
						</select></p>



						<p><input type="text" maxlength="200" name="txtNome"></p>
						<p>Data inicial :</p>
						<p><input type="text" maxlength="20" name="txtSenha" ></p>
						<p>Data final :</p>
						<p><input type="text" name="txtTipo" value="1" value="<?=$dados['DataFinal']?>"></p>

						<p>Valor :</p>
						<p><input type="text" name="txtTipo" value="1" value="<?=$dados['DataFinal']?>"></p>

						<p>Data final :</p>
						<p><input type="text" name="txtTipo" value="1" value="<?=$dados['DataFinal']?>"></p>

						<input type="submit" name="CadastrarConfiguradorBonus" value="Alterar cadastro">
						<input type="hidden" name="frmAlterarConfiguradorBonus" value="<?=$dados['codigo']?>">
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