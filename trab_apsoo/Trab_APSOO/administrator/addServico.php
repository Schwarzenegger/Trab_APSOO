<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<?php
	if(!isset($_SESSION["servico"]))
	{
		$_SESSION["servico"] = new Servico();
		$_SESSION["erro"] = new ErroForm();
	}
	$erro = $_SESSION["erro"];
	$servico = $_SESSION["servico"];

?>

<h3>Adicionar Servico</h3>

<form action="servicoValidate.php" method="post">

<table>
	<?php echo $erro->displayError("srv_nome","Nome do Servi&ccedil;o deve possuir pelo menos 3 caracteres") ?>
	<tr>
	  <td>Nome do Servi&ccedil;o </td>
	  <td><input type="text" name="srv_nome" value="<?php echo $servico->getNome() ?>" /></td>
	</tr>

	<?php echo $erro->displayError("srv_valor","Por favor digite um valor v&aacute;lido maior do que 0") ?>
	<tr>
	  <td>Valor do servi&ccedil;o</td>
          <td><input type="text" name="srv_valor" value="<?php echo $servico->getValor() ?>" /></td>
	</tr>

	<tr>
	  <td></td>
	  <td><input type="submit" class="submit" value="Adicionar" /></td>
	</tr>

</table>

</form>

<?php $erro->clearErroList() ?>


<?php require("_include/footer.php") ?>
