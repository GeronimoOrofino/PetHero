<?php
    require_once('nav.php');
?>


<main>
    
    <h2>Hola Guardian, que deseas realizar hoy?</h2>
    <br>
    <form action="<?php echo FRONT_ROOT ?> Guardian/enter_profile">
        <h4>LOGUEARTE</h4>
        <br>
        <input type="text" name = "Nombre" placeholder = Nombre >Ingrese su nombre
        <br>
        <input type="text" name = "Cuil" placeholder = Cuil >Ingrese su Cuil
        <br>
        <button type = "submit" > LOGUEARSE </button>
        <br>
    </form>

    
    <form action="<?php echo FRONT_ROOT ?> Login/registerGuardian_menu">
            <h4>REGISTRATE</h4>
            <button type = "submit"> Registrarte </button>
        </form>
    






</main>