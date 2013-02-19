<?php

	require("_include/lib.php");

	if(!isset($_POST["nome"]))
	{
		header("Location:addCliente.php");
	}

	if(!isset($_SESSION["cliente"]))
	{
		header("Location:addCliente.php");
	}

	$_SESSION["erro"]->clearErroList();
	$_SESSION["erro"]->setWrong(false);
	$_SESSION["cliente"]->loadCliente($_POST["nome"],$_POST["cpf"],$_POST["endereco"],$_POST["cidade"],$_POST["telefone"]);

	if(!($_SESSION["cliente"]->verifyNome()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("nome");
	}

	if(!($_SESSION["cliente"]->verifyCPF()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("cpf");
	}

	if(!($_SESSION["cliente"]->checkCPF()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("cpf-exist");
	}

	if(!($_SESSION["cliente"]->verifyEndereco()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("endereco");
	}

	if(!($_SESSION["cliente"]->verifyCidade()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("cidade");
	}

	if(!($_SESSION["cliente"]->verifyTelefone()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("telefone");
	}

	if($_SESSION["erro"]->getWrong())
	{
		header("Location:addCliente.php");
	}
	else
	{
		unset($_SESSION["erro"]);
		$_SESSION["cliente"]->saveCliente();
		unset($_SESSION["cliente"]);
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Cliente adicionado com sucesso!");
			window.location.replace('addCliente.php');
			self.location = 'addCliente.php';
		</script>
	   </head>
	   <body>
		Cliente adicionado com sucesso!<br />
		<a href="addCliente.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
<?php
	
	}
?>
