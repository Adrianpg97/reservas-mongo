<body>
    <?php
    spl_autoload_register(function ( $NombreClase) {
        include_once($NombreClase . '.php');
    });
    include './cabecera.php';
    //Abrir conexión
    $dbh = Db::conectar();
    $listaPeliculas = BDPelicula::mostrar();
    if (isset($_GET['id'])){
        $unaPelicula = BDPelicula::mostrarPorId($_GET['id']);
        $listaCriticas = BDPelicula::mostrarCriticas($_GET['id']);
    }
    ?>
    <table>
        <tr>
            <th>Autor</th>
            <th>Testo</th>
            <th>Nota</th>
            <th>Borrar</th>
        </tr>

<?php
//recorremos el array con objetos Pelicula y vamos pintado
foreach ($listaCriticas as $critica) {
    ?>
            <tr>
                <td><?php echo $critica->getAutor(); ?></td>
                <td><?php echo $critica->getTexto(); ?></td>
                <td><?php echo $critica->getNota(); ?></td>
                <td>
                    <a href='Manager.php?accion=eliminar&id=<?php echo $critica->getId()?>'>Eliminar</a>
                </td>
            </tr>
        <?php } include './pie.php'; ?>
    </table>
