<?php
    //session_start();
    if(isset ($_SESSION["Guardian"])){
        //$Guardian = new Guardian();
        $Guardian = $_SESSION["Guardian"];
    }

?>

<main>

    Solicitudes de reservas
    <form action="<?php echo FRONT_ROOT ?> Reserva\mostrar_reservas_de_guardian">
            <h5>VER LAS SOLICITUDES DE RESERVAS</h5>
            <button type = "submit"> ENTRAR </button>
        </form>
    Asignar horarios
    <form action="<?php echo FRONT_ROOT ?> Guardian\horarios">
            <h5>VER Y ASIGNAR NUEVOS HORARIOS</h5>
            <button type = "submit"> ENTRAR </button>
        </form>
    ver reseñas
    <form action="<?php echo FRONT_ROOT ?> Guardian\reseñas">
            <h5>VER RESEÑAS</h5>
            <button type = "submit"> ENTRAR </button>
        </form>
    modificar Precios
    <form action="<?php echo FRONT_ROOT ?> Guardian\ABMpreciosycuidados">
            <h5>MODIFICAR PRECIOS Y CUIDADOS</h5>
            <button type = "submit"> ENTRAR </button>
        </form>
    <form action="<?php echo FRONT_ROOT ?> Guardian\logout">
        <h5>LOG OUT</h5>
        <button type = "submit"> SALIR </button>
    </form>

</main>