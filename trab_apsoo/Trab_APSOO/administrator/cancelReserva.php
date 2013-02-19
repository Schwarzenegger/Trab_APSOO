<?php

    require("_include/lib.php");

    if(!isset($_GET["idres"]))
    {
        header("Location:listReserva.php");
    }

    $database = new bancoClass();
    $database->cancelReserva($_GET["idres"]);

?>

	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Reserva cancelada com sucesso!");
			window.location.replace('listReserva.php');
			self.location = 'listReserva.php';
		</script>
	   </head>
	   <body>
		Reserva cancelada com sucesso!<br />
		<a href="listReserva.php">Clique aqui</a> se n&atilde;o estiver carregando automaticamente...
	   </body>
	</html>

