<?php
	require("_include/lib.php");

	if(!isset($_POST["cli_id"]))
	{
		header("Location:addReserva.php");
	}

	if(!isset($_SESSION["reserva"]))
	{
		header("Location:addReserva.php");
	}

	$_SESSION["erro"]->clearErroList();
	$_SESSION["erro"]->setWrong(false);
	$_SESSION["reserva"]->loadReserva($_POST["cli_id"],$_POST["apt_id"],$_POST["datai"],$_POST["dataf"]);

	if(!($_SESSION["reserva"]->checkApt()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("apt");
	}

    if(!($_SESSION["reserva"]->checkDate()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("date");
	}

    if(!($_SESSION["reserva"]->checkDateF()))
	{
		$_SESSION["erro"]->setWrong(true);
		$_SESSION["erro"]->addError("datef");
	}

	if($_SESSION["erro"]->getWrong())
	{
		header("Location:addReserva.php");
	}
	
	else
	{
	  $_SESSION["reserva"]->saveReserva();
	  unset($_SESSION["reserva"]);
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Reserva adicionada com sucesso!");
			window.location.replace('addReserva.php');
			self.location = 'addReserva.php';
		</script>
	   </head>
	   <body>
		Reserva adicionada com sucesso!<br />
		<a href="addReserva.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
<?php
	}
?>
