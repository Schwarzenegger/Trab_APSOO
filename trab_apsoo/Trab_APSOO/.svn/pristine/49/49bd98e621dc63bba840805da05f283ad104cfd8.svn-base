<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<?php
	if(!isset($_SESSION["cliente"]))
	{
		$_SESSION["cliente"] = new Cliente();
		$_SESSION["erro"] = new ErroForm();
	}
	$erro = $_SESSION["erro"];
	$cliente = $_SESSION["cliente"];

?>

<h3>Adicionar Cliente</h3>

<form action="clienteValidate.php" method="post">

<table>
	<?php echo $erro->displayError("nome","Por favor digite nome e sobrenome v&aacute;lidos") ?>
	<tr>
	  <td>Nome Completo</td>
	  <td><input type="text" name="nome" value="<?php echo $cliente->getNome() ?>" /></td>
	</tr>

	<?php echo $erro->displayError("cpf","Por favor digite cpf v&aacute;lido") ?>
	<?php echo $erro->displayError("cpf-exist","CPF digitado j&aacute; est&aacute; cadastrado") ?>
	<tr>
	  <td>CPF</td>
	  <td><input type="text" name="cpf" value="<?php echo $cliente->getCPF() ?>" /> (ex.: 01234567890)</td>
	</tr>
	
	<?php echo $erro->displayError("endereco","Endere&ccedil;o deve possuir pelo menos 10 caracteres") ?>
	<tr>
	  <td>Endere&ccedil;o</td>
	  <td><input type="text" name="endereco" value="<?php echo $cliente->getEndereco() ?>" /></td>
	</tr>
	
	<?php echo $erro->displayError("cidade","Cidade deve possuir pelo menos 4 caracteres") ?>
	<tr>
	  <td>Cidade</td>
	  <td><input type="text" name="cidade" value="<?php echo $cliente->getCidade() ?>" /></td>
	</tr>


	<?php echo $erro->displayError("telefone","Por favor digite um telefone v&aacute;lido") ?>
	<tr>
	  <td>Telefone</td>
	  <td><input type="text" name="telefone" value="<?php echo $cliente->getTelefone() ?>" maxlength="12" size="12" /></td>
	</tr>

	<tr>
	  <td></td>
	  <td><input type="submit" class="submit" value="Adicionar" /></td>
	</tr>

</table>

</form>

<?php $erro->clearErroList() ?>

<?php require("_include/footer.php") ?>
