<?php
spl_autoload_register(function ( $NombreClase) {
    include_once($NombreClase . '.php');
});
include "./cabecera.php";
?>

<header class="cabecera">
    <h1>Insertar Pelicula</h1>
</header>
<section>

    <?php
    if (!$_POST) {
        //Si no has mandado nada pintas el formulario
        ?>

    <form action="Manager.php" method="post" enctype="multipart/form-data">

            <section>
                <label>Titulo:</label>
                <input type="text" name="titulo"required>
            </section>
            <section>
                <label>Género:</label>
                <input type="text" name="genero" required>
            </section>
            <section>
                <label>Director:</label>
                <input type="text" name="director" required>
            </section>
            <section>
                <label>Año:</label>
                <input type="number" name="year" required>
            </section>
            <section>
                <label>Sinopsis:</label>
                <input type="text" name="sinopsis" required>
            </section>   		
            <section>
                <label>Cartel:</label>
                <input type="file" name="cartel">
            </section>   		
            <section>
                <label></label>
                <input type="submit" name="insertar" value="Enviar">
            </section>

        </form>


    </section>

    <?php
}

include "./pie.php";
?>
