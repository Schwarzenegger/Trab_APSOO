<?php
    require("_include/lib.php");

    if(!isset($_POST["reserva"]))
    {
        header("Location:addDespesa.php");
    }

    $despesa = new Despesa();
    $despesa->loadDespesa($_POST["reserva"],$_POST["servico"]);
    $despesa->saveDespesa();
    unset($despesa);

?>

	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Despesa adicionada com sucesso!");
			window.location.replace('addDespesa.php');
			self.location = 'addDespesa.php';
		</script>
	   </head>
	   <body>
		Despesa adicionada com sucesso!<br />
		<a href="addDespesa.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>
