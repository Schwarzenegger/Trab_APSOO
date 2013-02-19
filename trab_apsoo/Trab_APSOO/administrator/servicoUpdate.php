<?php
	require("_include/lib.php");

	if(!isset($_POST["srv_nome"]))
	{
		header("Location:editServico.php");
	}

	if(!isset($_SESSION["servicoupdate"]))
	{
		header("Location:editServico.php");
	}

	$_SESSION["erro"]->clearErroList();
	$_SESSION["erro"]->setWrong(false);
	$_SESSION["servicoupdate"]->loadServico($_POST["srv_nome"],$_POST["srv_valor"]);


	if(!($_SESSION["servicoupdate"]->verifyNome()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("srv_nome");
	}

	
	if(!($_SESSION["servicoupdate"]->verifyValor()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("srv_valor");
	}

	if($_SESSION["erro"]->getWrong())
	{
		header("Location:editServico.php");
	}
	
	else
	{
	  $_SESSION["servicoupdate"]->updateServico();
	  unset($_SESSION["servicoupdate"]);
	  unset($_SESSION["erro"]);
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Servico alterado com sucesso!");
			window.location.replace('listServico.php');
			self.location = 'listServico.php';
		</script>
	   </head>
	   <body>
		Servi&ccedil;o alterado com sucesso!<br />
		<a href="listServico.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
<?php
	}
?>
