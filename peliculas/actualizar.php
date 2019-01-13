<?php
spl_autoload_register(function ( $NombreClase) {
    include_once($NombreClase . '.php');
});
include "./cabecera.php";
?>

<header class="cabecera">
    <h1>Actualizar Pelicula</h1>
</header>
<section>

    <?php
    if (isset($_GET["id"])){
        $unaPelicula = BDPelicula::mostrarPorId($_GET["id"]);
    }  
    ?>
    <form action="Manager.php" method="post" enctype="multipart/form-data">

        <section>
            <label>Titulo:</label>
            <input type="text" name="titulo" value="<?php echo $unaPelicula->getTitulo();?>" required>
        </section>
        <section>
            <label>Género:</label>
            <input type="text" name="genero" value="<?php echo $unaPelicula->getGenero();?>" required>
        </section>
        <section>
            <label>Director:</label>
            <input type="text" name="director" value="<?php echo $unaPelicula->getDirector();?>" required>
        </section>
        <section>
            <label>Año:</label>
            <input type="number" name="year" value="<?php echo $unaPelicula->getYear();?>" required>
        </section>
        <section>
            <label>Sinopsis:</label>
            <input type="text" name="sinopsis" value="<?php echo $unaPelicula->getSinopsis();?>" required>
        </section>   		
        <section>
            <label>Cartel:</label>
            <input type="file" name="cartel" value="<?php echo $unaPelicula->getCartel();?>">
        </section>   		
        <section>
            <label></label>
            <input type="hidden" name="id" value="<?php echo $unaPelicula->getId();?>">
        </section>
        <section>
            <label></label>
            <input type="submit" name="actualizar" value="Enviar">
        </section>

    </form>


</section>

<?php
include "./pie.php";
?>