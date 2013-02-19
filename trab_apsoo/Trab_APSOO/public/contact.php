<?php require("_include/header.php") ?>

<h1>Contato</h1>


Ashford Castle, Cong, Co Mayo, Ireland
<br />
Tel: +353 94 9546003,<br />
Fax: +353 94 9546260,<br />
USA: 1800 346 7007

<br /><br />

Mande d&uacute;vidas, sugest&oacute;es e/ou reclama&ccedil;&otilde;es. Teremos prazer em
respond&ecirc;-lo e avaliar suas sugest&otilde;es

<br /><br />

<?php
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
?>

<form action="sendEmail.php" method="post">
<table>

	<?php $erro->displayError("name","Por favor digite nome e sobrenome v&aacute;lidos") ?>
	<tr>
	   <td>Nome:</td>
	   <td><input type="text" name="name" value="<?php echo $email->getName() ?>" /></td>
	</tr>

	<?php $erro->displayError("email","Por favor digite um e-mail v&aacute;lido") ?>
	<tr>
	   <td>E-mail:</td>
	   <td><input type="text" name="email" value="<?php echo $email->getEmail() ?>" /></td>
	</tr>

	<?php $erro->displayError("msg","Mensagem deve possuir pelo menos 10 caracteres") ?>
	<tr>
	   <td>Mensagem:</td>
	   <td><textarea name="msg" cols="30" rows="10" /><?php echo $email->getMsg() ?></textarea></td>
	</tr>

	<tr>
	   <td></td>
	   <td><input type="submit" value="Enviar" class="submit" /></td>
	</tr>

</table>
</form>

<?php $erro->clearErroList() ?>
<?php require("_include/footer.php") ?>
