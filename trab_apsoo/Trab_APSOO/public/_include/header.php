<?php require("_include/lib.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>:.: Ashford Castle :.:</title>
	<link href="_css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
   <div class="content">   <!-- Corpo do conteudo do site -->
     <div class="header">  <!-- Cabeçalho Menu-Logo -->
       	<div class="logo"> <!-- Logo -->
  	    <a href="index.php"><?php echo loadImage("logo.png","Ashford Castle") ?></a>
	</div>

	<?php require("_include/menu_link.php") ?>

     </div><!-- Fim cabeçalho menu-logo -->

     <div class="introduction"><!-- Introdução -->
  	<h2>Bem-Vindo</h2>
  	<p>Construido por volta de 1228 e uma vez lar da fam&iacute;lia Guinness, o luxuoso Hotel 5 estrelas Ashford Castle tornou-se hotel em 1939.</p>
	<p>Eleito como melhor resort na Irlanda pelo Conde Nast em 2008, e o segundo melhor resort da Europa, teremos prazer de convidá-lo e dá-lo as boas vindas
	   em nosso 70&deg; anivers&aacute;rio!</p>
     </div><!-- Fim introdução -->

     <div class="introduction-image"><!-- Imagem randômica -->
	<?php echo randomImage() ?>
     </div><!-- Fim imagem randômica -->

     <div class="main">
        <div class="main-left">
	<!-- Conteudo da pagina -->
