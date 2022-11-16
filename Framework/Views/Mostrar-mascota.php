<main>

    <h2>Mascota</h2>
    <thead>
         
    </thead>
    <tbody>
                    <tr>
                        <br>
                         <td>Nombre: <?php echo $Mascota->get_nombre() ?></td>
                         <br>
                         <td>Raza: <?php echo $Mascota->get_raza() ?></td>
                         <br>
                         <td>Tamaño: <?php echo $Mascota->get_tamaño() ?></td>
                         <br>
                         <td>Observaciones: <?php echo $Mascota->get_observaciones() ?></td>
                         <br>
                         <td>Foto:  <img src="<?php echo $Mascota->get_urlimagen() ?>" alt="No se ve man"></td>
                         <br>
                         <td>Vacunas:  <img src="<?php echo $Mascota->get_urlvacunacion() ?>" alt="No se ve man"></td>
                         <br>
                         <td>Video: <video src="<?php echo $Mascota->get_urlvideo() ?>" ></video></td>
                         <br>
                    </tr>

        </tr>
    </tbody>




</main>