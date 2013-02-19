<?php
	require("_include/lib.php");

	if(!isset($_POST["srv_nome"]))
	{
		header("Location:addServico.php");
	}

	if(!isset($_SESSION["servico"]))
	{
		header("Location:addServico.php");
	}

	$_SESSION["erro"]->clearErroList();
	$_SESSION["erro"]->setWrong(false);
	$_SESSION["servico"]->loadServico($_POST["srv_nome"],$_POST["srv_valor"]);


	if(!($_SESSION["servico"]->verifyNome()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("srv_nome");
	}

	
	if(!($_SESSION["servico"]->verifyValor()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("srv_valor");
	}

	if($_SESSION["erro"]->getWrong())
	{
		header("Location:addServico.php");
	}
	
	else
	{
	  $_SESSION["servico"]->saveServico();
	  unset($_SESSION["servico"]);
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Servico adicionado com sucesso!");
			window.location.replace('addServico.php');
			self.location = 'addServico.php';
		</script>
	   </head>
	   <body>
		Servi&ccedil;o adicionado com sucesso!<br />
		<a href="addServico.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
<?php
	}
?>
