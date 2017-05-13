<?php
if (!isset($_COOKIE['tipoUsuario'])) {
	header("Location: /ProjetoTEF2017/acessoNegado.php");
}

$titulo = "Login indica bonus";