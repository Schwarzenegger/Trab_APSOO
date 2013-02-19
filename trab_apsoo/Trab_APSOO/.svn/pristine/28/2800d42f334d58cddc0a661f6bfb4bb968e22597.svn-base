<?php require("_include/header.php") ?>
<?php require("_include/menu.php") ?>

<?php

    $despesa = new Despesa();

    if(isset($_GET["idres"]))
    {
        $despesa->loadDespesa($_GET["idres"],-1);
    }

?>

    <h3>Adicionar Despesa</h3>

    <p>As despesas s&oacute; poder&atilde;o ser adicionadas nas reservas ativas (ou seja, reservas que est&atilde;o sendo utilizadas
       atualmente)</p>

    <form action="despesaValidate.php" method="post">
    <table cellspacing="2" cellpadding="2">
       <tr>
        <td>Reserva:</td>
        <td><select class="select" name="reserva">
        <?php
            $query_reservas = $despesa->getReservasAtivas();
            while($reserva = mysql_fetch_array($query_reservas))
            {
                ?>
                <option value="<?php echo $reserva[0] ?>" <?php
                  if($despesa->reserva == $reserva[0])
                    echo "selected='selected' ";
                ?>><?php echo $reserva[1] . " - " . $reserva[2] ?></option>
                <?php
            }

        ?>
        </select></td>
       </tr>
       
       <tr>
        <td>Servi&ccedil;o:</td>
        <td><select class="select" name="servico">
        <?php
            $query_servico = $despesa->getServicos();
            while($servico = mysql_fetch_array($query_servico))
            {
                ?>
                <option value="<?php echo $servico["id"] ?>"><?php echo $servico["srv_nome"] ?></option>
                <?php
            }
        ?>
        </select></td>
       </tr>

       <tr>
        <td></td>
        <td><input type="submit" class="submit" value="Adicionar Despesa" /></td>
       </tr>

    </table>
    </form>
    
<?php require("_include/footer.php") ?>