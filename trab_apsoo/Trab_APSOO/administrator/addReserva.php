<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<?php
	if(!isset($_SESSION["reserva"]))
	{
		$_SESSION["reserva"] = new Reserva();
		$_SESSION["erro"] = new ErroForm();
	}
	$erro = $_SESSION["erro"];
	$reserva = $_SESSION["reserva"];
?>


<script type="text/javascript">
    $(document).ready(function(){
 
        $('#datai').datepicker({
        showOn: 'button',
        dateFormat: 'yy-mm-dd'
    });

    $('#dataf').datepicker({
        showOn: 'button',
        dateFormat: 'yy-mm-dd'
    });

});
</script>


<h3>Adicionar Reserva</h3>

<form id = "form" action="reservaValidate.php" method="post">

<table>
	<tr>
	  <td>Nome do Cliente</td>
	  <td><select class = "select" name="cli_id">
	  <?php $reserva->getClientes() ?>
	  </select></td>
	</tr>

	<?php echo $erro->displayError("apt","Apartamento j&aacute; est&aacute; reservado neste per&iacute;odo") ?>
	<tr>
	  <td>Apartamento</td>
          <td><select class = "select" name="apt_id">
	  <?php $reserva->getApts() ?>
	  </select></td>
	</tr>

    <?php echo $erro->displayError("date", "Escolha uma data v&aacute;lida (come&ccedil;ando da data atual)") ?>
	<?php echo $erro->displayError("datai","Data Inicial inv&aacute;lida") ?>
	<tr>
	  <td>Data Inicial</td>
	  <td><input type="text" class = "select" name="datai" id="datai" value="<?php echo $reserva->getDataI() ?>" /></td>
	</tr>

    <?php echo $erro->displayError("datef", "Escolha uma data final maior do que inicial") ?>
	<?php echo $erro->displayError("dataf","Data Final inv&aacute;lida") ?>
	<tr>
	  <td>Data Prevista para Fim da Reserva</td>
	  <td><input type="text" class = "select" name="dataf" id="dataf" value="<?php echo $reserva->getDataF()  ?>" /></td>
	</tr>
	<tr>
	  <td></td>
	  <td><input type="submit" class="submit" value="Adicionar" /></td>
	</tr>

</table>

</form>

<?php $erro->clearErroList() ?>


<?php require("_include/footer.php") ?>
