<?php
include 'includes/cabecera.php';
spl_autoload_register( function( $NombreClase ) {
        include_once($NombreClase . '.php');
    } );
    
    if (isset($_GET["id"])) {
        //Muestra los datos de la reserva a modificar
        $unaReserva = CrudReserva::mostrarID($_GET['id']);
    }
?>
    <form action="manager.php" method="post">
        <input type="hidden" name="id" value="<?php echo $unaReserva->getId();?>">
        <label>Nombre</label>
        <input type="text" value="<?php echo $unaReserva->getNombre();?>" name="nombre" readonly><br>
        <label>Apellidos</label>
        <input type="text" value="<?php echo $unaReserva->getApellidos();?>"name="apellidos" readonly><br>
        <label>Numero de comensales</label>
        <input type="number" value="<?php echo $unaReserva->getComensales();?>" name="comensales" required><br>
        <label>Fecha de reserva</label>
        <input type="date" name="fecha" required><br>
        <label>Hora</label>
        <input type="time" name="hora" value="<?php echo $unaReserva->getHora();?>" required><br>
        <button name="actualizar">Modificar</button>
    </form>
<?php 
    include 'includes/pie.php';
?>