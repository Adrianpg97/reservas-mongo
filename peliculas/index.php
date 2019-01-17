    <?php
    spl_autoload_register(function ( $NombreClase) {
        include_once($NombreClase . '.php');
    });
    include './cabecera.php';
        //Abrir conexión
    $listaPeliculas = BDPelicula::mostrar();

    ;
    ?>

    <table>
        <tr>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Director</th>
            <th>Año</th>
            <th>Sinopsis</th>
            <th>Cartel</th>
            <th>Críticas</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>

        <?php
        //recorremos el array con objetos Pelicula y vamos pintado
        foreach ($listaPeliculas as $pelicula) {
            ?>
            <tr>
                <td><?php echo $pelicula->getTitulo(); ?></td>
                <td><?php echo $pelicula->getGenero(); ?></td>
                <td><?php echo $pelicula->getDirector(); ?></td>
                <td><?php echo $pelicula->getYear(); ?></td>
                <td><?php echo $pelicula->getSinopsis(); ?></td>
                <td>
                    <img src="<?php echo $pelicula->getCartel(); ?>">
                </td>
                <td>
                    <a href='Manager.php?accion=criticas&id=<?php echo $pelicula->getId() ?>'>Ver Criticas</a>
                </td>
                
                <td>
                    <a href='Manager.php?accion=actualizar&id=<?php echo $pelicula->getId() ?>'>Actualizar</a>
                </td>
                <td>
                    <a href='Manager.php?accion=eliminar&id=<?php echo $pelicula->getId() ?>'>Eliminar</a>
                </td>
            </tr>
<?php } include './pie.php' ?>
    </table>
