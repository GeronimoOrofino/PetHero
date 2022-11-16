<?php
    require_once('nav.php');
?>


<main>
    
    <h2>Hola Dueño, que deseas realizar hoy?</h2>
    <br>
    <form action="<?php echo FRONT_ROOT ?> Duenio/enter_profile">
        <h4>LOGUEARTE</h4>
        <br>
        <input type="text" name = "Nombre" placeholder = "Nombre" >Ingrese su nombre
        <br>
        <input type="text" name = "DNI" placeholder = "DNI" >Ingrese su DNI
        <br>
        <button type = "submit" > LOGUEARSE </button>
        <br>
    </form>

    
    <form action="<?php echo FRONT_ROOT ?> Login/registerDuenio_menu">
            <h4>REGISTRATE</h4>
            <button type = "submit"> Registrarte </button>
    </form>


</main>