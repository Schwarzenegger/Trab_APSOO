<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>
<?php require("_include/_function/script.php") ?>

<h3>Listando Reservas</h3>

<ul class="reservaStatus">
    <li><a href="javascript:changeStatus('reservaAtiva')">Ativas</a></li>
    <li><a href="javascript:changeStatus('reservaEmEspera')">Em Espera</a></li>
    <li><a href="javascript:changeStatus('reservaConcluida')">Conclu&iacute;das</a></li>
    <li><a href="javascript:changeStatus('reservaCancelada')">Canceladas</a></li>
</ul>

<?php $database = new bancoClass()  ?>

<div id="reservaAtiva">
    
    <table class="list" cellpadding="0" cellspacing="0" align="center">
    
    <tr>
        <td colspan="7"><h3>Ativas</h3></td>
    </tr>


    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
        <td>Detalhes</td>
        <td>Adicionar Despesa</td>
        <td>Cancelar Reserva</td>
    </tr>


    <?php
        
        $query_ativas = $database->getActiveReservas();
        while($reserva = mysql_fetch_array($query_ativas))
        {
            ?>
           <tr>
                <td><?php echo $reserva[1] ?></td>
                <td><?php echo $reserva[2] ?></td>
                <td><?php echo $reserva[3] ?></td>
                <td><?php echo $reserva[4] ?></td>
                <td><a href="detailsReserva.php?idres=<?php echo $reserva[0] ?>"><?php echo loadImage("find.png") ?></a></td>
                <td><a href="addDespesa.php?idres=<?php echo $reserva[0] ?>"><?php echo loadImage("add.png") ?></a></td>
                <td><a href="cancelReserva.php?idres=<?php echo $reserva[0] ?>" onClick="return confirm('Deseja mesmo cancelar a reserva?')"><?php echo loadImage("cancel.png") ?></a></td>
           </tr>
    <?php
        }
      
    ?>
    </table>

</div>

<div id="reservaEmEspera">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr>
        <td colspan="7"><h3>Em Espera</h3></td>
    </tr>

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
        <td>Detalhes</td>
        <td>Ativar Reserva</td>
        <td>Cancelar Reserva</td>
    </tr>


    <?php
        $query_espera = $database->getInWaitReservas();
        while($reserva = mysql_fetch_array($query_espera))
        {
            ?>
           <tr>
                <td><?php echo $reserva[1] ?></td>
                <td><?php echo $reserva[2] ?></td>
                <td><?php echo $reserva[3] ?></td>
                <td><?php echo $reserva[4] ?></td>
                <td><a href="detailsReserva.php?idres=<?php echo $reserva[0] ?>"><?php echo loadImage("find.png") ?></a></td>
                <td><a href="activeReserva.php?idres=<?php echo $reserva[0] ?>" onClick="return confirm('Deseja mesmo ativar a reserva?')"><?php echo loadImage("confirm.png") ?></a></td>
                <td><a href="cancelReserva.php?idres=<?php echo $reserva[0] ?>" onClick="return confirm('Deseja mesmo cancelar a reserva?')"><?php echo loadImage("cancel.png") ?></a></td>
           </tr>
    <?php
        }
    ?>
    </table>

</div>

<div id="reservaCancelada">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr>
        <td colspan="4"><h3>Canceladas</h3></td>
    </tr>

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
    </tr>


    <?php
        $query_canceladas = $database->getCanceledReservas();
        while($reserva = mysql_fetch_array($query_canceladas))
        {
            ?>
           <tr>
                <td><?php echo $reserva[1] ?></td>
                <td><?php echo $reserva[2] ?></td>
                <td><?php echo $reserva[3] ?></td>
                <td><?php echo $reserva[4] ?></td>
           </tr>
    <?php
        }
    ?>
    </table>

</div>

<div id="reservaConcluida">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr>
        <td colspan="6"><h3>Conclu&iacute;das</h3></td>
    </tr>

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
    </tr>


    <?php
        $query_concluidas = $database->getConcludedReservas();
        while($reserva = mysql_fetch_array($query_concluidas))
        {
            ?>
           <tr>
                <td><?php echo $reserva[1] ?></td>
                <td><?php echo $reserva[2] ?></td>
                <td><?php echo $reserva[3] ?></td>
                <td><?php echo $reserva[4] ?></td>
           </tr>
    <?php
        }
    ?>
    </table>

</div>

<?php require("_include/footer.php") ?>