<?php
    require_once('nav.php');
?>


<main>
    <h3>Bienvenido a tu registo de Dueño, por favor complete todos los campos</h3>
    <form action="<?php echo FRONT_ROOT ?> Duenio/add" method = "post">
    <br>
        <input type="text" name = "Nombre" placeholder = "Nombre" >Ingrese su nombre
        <br>
        <input type="text" name= "Direccion" placeholder = "Direccion"> Direccion
        <br>
        <input type="number" name = "DNI" placeholder = "DNI" >Ingrese su DNI
        <br>
        <input type="number" name= "Telefono" placeholder = "Telefono"> Telefono

        <br>
        <br>

        <button Type= "submit" > Finalizar </button>
        
    </form>

</main>