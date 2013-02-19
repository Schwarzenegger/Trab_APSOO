<script language="JavaScript">

function changeStatus(id)
{
    var ativa = document.getElementById("reservaAtiva");
    var concluida = document.getElementById("reservaConcluida");
    var cancelada = document.getElementById("reservaCancelada");
    var emEspera = document.getElementById("reservaEmEspera");

    ativa.style.display = "none";
    concluida.style.display = "none";
    cancelada.style.display = "none";
    emEspera.style.display = "none";

    switch(id)
    {
        case "reservaAtiva": ativa.style.display = "block"; break;
        case "reservaConcluida": concluida.style.display = "block"; break;
        case "reservaCancelada": cancelada.style.display = "block"; break;
        case "reservaEmEspera": emEspera.style.display = "block"; break;
    }

}

</script>
