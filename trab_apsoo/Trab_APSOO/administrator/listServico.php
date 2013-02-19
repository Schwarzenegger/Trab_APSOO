<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<h3>Listando todos os servi&ccedil;os</h3>

<table class="list" cellpadding="0" cellspacing="0" align="center">
  <tr class="list_info">
	<td>Cod.</td>
	<td>Nome</td>
	<td>Valor</td>
	<td>Atualizar</td>
	<td>Remover</td>
  </tr>
  
<?php 
	$servicos = new Servico();
	$list = $servicos->getServicos();
	while($servico = mysql_fetch_array($list))
	{
?>
	<tr>
		<td><?php echo $servico["id"] ?></td>
		<td><?php echo $servico["srv_nome"] ?></td>
		<td><?php echo $servico["srv_valor"] ?></td>
		<td class="button"><a href="editServico.php?srvid=<?php echo $servico["id"] ?>"><?php echo loadImage("edit.png") ?></a></td>
		<td class="button"><a href="deleteServico.php?srvid=<?php echo $servico["id"] ?>" onClick="return confirm('Deseja mesmo deletar este servico?')"><?php echo loadImage("cancel.png") ?></a></td>
	</tr>

<?php } ?>
</table>
<?php require("_include/footer.php") ?>