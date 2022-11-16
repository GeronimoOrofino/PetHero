<?php
    //session_start();
    if(isset ($_SESSION["Duenio"])){
        //$Guardian = new Guardian();
        $Duenio = $_SESSION["Duenio"];
    }

?>
<main>
     <H3>BIENVENIDO DUEÑO</H3>

    <form action="<?php echo FRONT_ROOT ?> Login/registerMascota_menu">
                <h4>REGISTRA UNA MASCOTA</h4>
                <button type = "submit"> ACCCEDER </button>
    </form>

    <form action="<?php echo FRONT_ROOT ?> Mascota/contratar_guardian">
                <h4>CONTRATA UN GUARDIAN</h4>
                <button type = "submit"> ACCEDER </button>
    </form>

    <form action="<?php echo FRONT_ROOT ?> Duenio/dejar_review">
                <h4>DEJAR REVIEW</h4>
                <button type = "submit"> ACCEDER </button>
    </form>

    <form action="<?php echo FRONT_ROOT ?> Duenio/pagar_solicitudes">
                <h4>PAGOS</h4>
                <button type = "submit"> ACCEDER </button>
    </form>
    <form action="<?php echo FRONT_ROOT ?> Duenio\logout">
        <h5>LOG OUT</h5>
        <button type = "submit"> SALIR </button>
    </form>



</main>