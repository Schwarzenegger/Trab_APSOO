<?php 
	require("_include/lib.php");
	
	if( !isset($_SESSION["emailData"]) )
	{
			$erro = new ErroForm();
			$email = new EmailData();
	}
	else
	{
			$erro = $_SESSION["erroEmail"];
			$email = $_SESSION["emailData"];
	}
	
	
	$erro->setWrong(false);
	$email->loadData($_POST["name"],$_POST["email"],$_POST["msg"]);
	
	if( !($email->verifyName()) )
	{
		$erro->setWrong(true);
		$erro->addError("name");
	}
	
	if( !($email->verifyEmail()) )
	{
		$erro->setWrong(true);
		$erro->addError("email");
	}
	
	if( !($email->verifyMsg()) )
	{
		$erro->setWrong(true);
		$erro->addError("msg");
	}
	
	if($erro->getWrong())
	{
		$_SESSION["emailData"] = $email;
		$_SESSION["erroEmail"] = $erro;
		header("Location:contact.php");
	}
	
	else
	{
		$email->sendEmail();
		if(isset($_SESSION["emailData"]))
		{
			unset($_SESSION["emailData"]);
		}
		if(isset($_SESSION["erroEmail"]))
		{
			unset($_SESSION["erroEmail"]);
		}
?>
	<html>
	  <head>
		<META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<script language="JavaScript">
			alert("Mensagem enviada com sucesso!");
			window.location.replace('index.php');
			self.location = 'index.php';
		</script>
	   </head>
	   <body>
		Mensagem enviada com sucesso!<br />
		<a href="index.php">Clique aqui</a> se não estiver carregando automaticamente...
	   </body>
	</html>
<?php
	}

?>

