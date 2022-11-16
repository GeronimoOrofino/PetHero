<?php
    require_once('nav.php');
?>


<main>
    <h4>Ingrese el Cuil del guardian que quiere contratar</h4>
    <form action="<?php echo FRONT_ROOT ?> Guardian/enviar_solicitud">
        <input type="number" name = "Cuil" >
      
        <button type = submit>Enviar solicitud</button>
    </form>

</main>