<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<h3>Detalhes da Reserva</h3>

<?php

        $database = new bancoClass();
        $query_reserva = $database->getReservasById($_GET["idres"]);
        if($reserva = mysql_fetch_array($query_reserva)):
?>

    <table align="center" cellpadding="0" cellspacing="0" class="details">
        <tr>
            <td class="label">Cliente</td>
            <td><?php echo $reserva[0] ?></td>
        </tr>

        <tr>
            <td class="label">Apartamento</td>
            <td><?php echo $reserva[1] ?></td>
        </tr>

        <tr>
            <td class="label">Data In&iacute;cio</td>
            <td><?php echo $reserva[2] ?></td>
        </tr>

        <tr>
            <td class="label">Data Fim</td>
            <td><?php echo $reserva[3] ?></td>
        </tr>

        <tr>
            <td class="label">Status</td>
            <td><?php
                switch($reserva[3])
                {
                    case 0: echo "Cancelada"; break;
                    case 1: echo "Em Espera"; break;
                    case 2: echo "Ativa"; break;
                    case 3: echo "Conclu&iacute;da"; break;
                }

                ?></td>
        </tr>

        <tr>
            <td class="label">Servi&ccedil;os</td>
            <td>
                <table class="list" cellspacing="0" cellpadding="0">
                    <tr class="list_info">
                        <td>Nome do Servi&ccedil;o</td>
                        <td>Valor</td>
                        <td>Remover</td>
                    </tr>

                    <?php
                        $query_servicos = $database->getServicoByRes($_GET["idres"]);
                        while($servico = mysql_fetch_array($query_servicos))
                        {
                            ?>
                                <tr>
                                    <td><?php echo $servico[1] ?></td>
                                    <td><?php echo $servico[2] ?></td>
                                    <td><a href="deleteServ?idser=<?php echo $servico[0] ?>" onClick="return confirm('Deseja mesmo remover este servico?')"><?php echo loadImage("cancel.png") ?></a>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </td>

        </tr>

    </table>
    
    <?php else: echo "N&atilde;o foi poss&iacute;vel localizar a reserva no banco"; ?>
    <?php endif ?>
<?php require("_include/footer.php") ?>
