<?php
    require_once('nav.php');
?>


<main>
    <h3>Bienvenido a tu registo de guardian, por favor complete todos los campos</h3>
    <form action="<?php echo FRONT_ROOT ?> Guardian/add" method = "post">
    <br>
        <input type="text" name = "Nombre" placeholder = "Nombre" >Ingrese su nombre
        <br>
        <input type="text" name= "Direccion" placeholder = "Direccion"> Direccion
        <br>
        <input type="number" name = "Cuil" placeholder = "Cuil" >Ingrese su Cuil sin espacios ni guiones
        <br>
        <h5>¿Que dias te gustaria ser Guardian?</h5>
        <br>
        <input type="Date" name = "disponibilidadE" required> 
        <input type="Date" name = "disponibilidadS" required> 
        
        <br>
        <h5>¿Que animales cuidas?</h5>

        <select name = "TCH">¿Cuidas animales chicos?
            <option value="Chico">SI</option>
            <option value="NO">NO</option>
        </select>
        <select name = "TME">¿Cuidas animales medianos?
            <option value="Mediano">SI</option>
            <option value="NO">NO</option>
        </select>
        <select name = "TGR">¿Cuidas animales grandes?
            <option value="Grande">SI</option>
            <option value="NO">NO</option>
        </select>

        <br>
        
        <h5>¿Cuanto cobraras por cada animal?</h5>
        
        <h6>En caso de no cuidar algun tipo de animal, dejar la casilla en blanco o poner 0</h6>
        Animal Pequeño <br>  <input type="number" name="PCH" placeholder ="$$$"> <br>
        Animal Mediano <br> <input type="number" name="PME" placeholder ="$$$"><br>
        Animal Grande  <br> <input type="number" name="PGR"  placeholder ="$$$"><br>
        
        <br>

        <button Type= "submit" > Finalizar </button>
        
    </form>

</main>