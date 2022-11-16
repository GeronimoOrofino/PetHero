<?php
    require_once('nav.php');
?>


<main>
    <h4>Ingrese el Nombre de la mascota que desea cuidar</h4>
    <form action="<?php echo FRONT_ROOT ?> Mascota/mascota_para_ingresar">
        <input type="text" name = "N" >
        <h4>elija una fecha o un rango de fechas  que tenga disponible el cuidador</h4>
        <input type="Date" name = "DE" required> 
        <input type="Date" name = "DS" required> 
        <button type = submit>Ver lista de guardianes disponibles</button>
    </form>
    


</main>