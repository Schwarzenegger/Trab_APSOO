<?php
	require("_include/lib.php");

	if(!isset($_GET["srvid"]))
	{
		header("Location:listServico.php");
	}

	$servico = new Servico();
	
	$servico->loadServicoById($_GET["srvid"]);

	$servico->deletarServico();
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Servico deletado com sucesso!");
			window.location.replace('listServico.php');
			self.location = 'listServico.php';
		</script>
	   </head>
	   <body>
		Servi&ccedil;o deletado com sucesso!<br />
		<a href="listServico.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
