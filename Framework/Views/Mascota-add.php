<?php
    require_once('nav.php');
?>


<main>
    <h3>Bienvenido al registro de tus compañeros animales, por favor complete todos los campos</h3>
    <form action="<?php echo FRONT_ROOT ?> Mascota/add" method = "post">
    <br>
        <input type="text" name = "nombre" placeholder = "Nombre" >Ingrese su nombre
        <br>
        
        <select name="raza" >Raza y/o Especie
            <option value="Desconocido">Desconocido</option>
            <option value="Pitbull">Pitbull</option>
            <option value="Caniche">Caniche</option>
            <option value="Grandanes">Grandanes</option>
            <option value="Dogo">Dogo</option>
            <option value="Golden Retriever">Golden Retriever</option>
            <option value="Ovejero Aleman">Ovejero Aleman</option>
            <option value="Pastor Ingles">Pastor Ingles</option>
            <option value="Pug">Pug</option>
            <option value="Gato">Gato</option>
        </select>
        <br>
        <select name="tamaño" >
            <option value="Chico">Chico</option>
            <option value="Mediano">Mediano</option>
            <option value="Grande">Grande</option>
        </select>
        <br>
        Observaciones
        <textarea  name= "observaciones" cols=50 row=10 maxlength=150>  </textarea>
        <br>
        <input type="file" name = "urlimagen" > Foto de tu mascota
        <br>
        <input type="file" name = "urlvacunacion" > Vacunacion
        <br>
        <input type="file" name = "urlvideo" > Video



        <button Type= "submit" > Finalizar </button>
        
    </form>

</main>