<main>
    <h4>Ingrese el id de la reserva  y una accion </h4>
    <form action="<?php echo FRONT_ROOT ?> Reserva/modificar_reserva">

        <select name="accion" >Aceptar o rechazar
            <option value="Aceptar">Aceptar</option>
            <option value="Rechazar">Rechazar</option>

        </select>
        <input type="number" name = "id" >

        <button type = submit>Aceptar</button>
    </form>

</main>