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

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
        <td>Detalhes</td>
        <td>Adicionar Despesa</td>
        <td>Alterar Data Final</td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
           </tr>
    <?php
        }
      
    ?>
    </table>

</div>

<div id="reservaEmEspera">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
        <td>Alterar Data In&iacute;cio</td>
        <td>Alterar Data Final</td>
        <td>Cancelar Reserva</td>
    </tr>


    <?php
        /*
        $query_ativas = $database->getActiveReserva();
        while($reserva = mysql_fetch_array($query_ativas))
        {
            ?>
           <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
           </tr>
    <?php
        }
       */
    ?>
    </table>

</div>

<div id="reservaCancelada">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
    </tr>


    <?php
        /*
        $query_ativas = $database->getActiveReserva();
        while($reserva = mysql_fetch_array($query_ativas))
        {
            ?>
           <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
           </tr>
    <?php
        }
       */
    ?>
    </table>

</div>

<div id="reservaConcluida">

    <table class="list" cellpadding="0" cellspacing="0" align="center">

    <tr class="list_info">
        <td>Cliente</td>
        <td>Apartamento</td>
        <td>Data In&iacute;cio</td>
        <td>Data Final</td>
    </tr>


    <?php
        /*
        $query_ativas = $database->getActiveReserva();
        while($reserva = mysql_fetch_array($query_ativas))
        {
            ?>
           <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
           </tr>
    <?php
        }
       */
    ?>
    </table>

</div>

<?php require("_include/footer.php") ?>