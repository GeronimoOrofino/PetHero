<?php
    
    require_once('nav.php');
    
?>

<main>

    <h2>Lista de Guardianes</h2>
    <thead>
         
    </thead>
    <tbody>
                <?php
                 foreach($GuardianList as $Guardian)
                    {
                ?>
                    <tr>
                        <br>
                         <td>Nombre: <?php echo $Guardian->get_nombre() ?></td>
                         <br>
                         <td>Direccion: <?php echo $Guardian->get_direccion() ?></td>
                         <br>
                         <td>Cuil: <?php echo $Guardian->get_cuil() ?></td>
                         <br>
                         <td><?php echo $Guardian->mostrar_fechas($Guardian->get_disponibilidad()) ?></td>
                         <td><?php echo $Guardian->mostrar_tamaños($Guardian->get_tamaños()) ?></td>
                         <td><?php echo $Guardian->mostrar_precios($Guardian->get_precio(),$Guardian->get_tamaños()) ?></td>
                         <br>
                         <td>Puntos: <?php echo $Guardian->get_puntos() ?></td>
                         <br>
                    </tr>
               <?php
                    }
                ?>
        </tr>
    </tbody>




</main>