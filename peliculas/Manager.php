<?php

spl_autoload_register(function ( $NombreClase) {
    include_once($NombreClase . '.php');
});

//Se comprueba que se ha pulsado actualizar o eliminar
if (isset($_GET['accion'])) {
    if ($_GET['accion'] == "eliminar") {
        //Se elimina la pelicula llamando al metodo correspondiente
        BDPelicula::eliminar($_GET['id']);
        header("Location: index.php");
    } else if ($_GET['accion'] == "actualizar") {
        //se pinta el formulario para actualizar la pelicula
        header("Location: actualizar.php?id=" . $_GET['id']);
    } else if ($_GET['accion'] == "criticas") {
        header("Location: criticas.php?id=" . $_GET['id']);
    }
}
//se comprueba que se han recibido los datos del formulario
if (isset($_POST['insertar'])) {
    $ruta = subir();
    $unaPelicula = new Pelicula(0, $_POST['titulo'], $_POST['genero'], $_POST['director'], $_POST['year'], $_POST['sinopsis'], $ruta);
    BDPelicula::insertar($unaPelicula);
    header("Location: index.php");
} else if (isset($_POST['actualizar'])) {
    $ruta = subir();
    $unaPelicula = new Pelicula($_POST['id'], $_POST['titulo'], $_POST['genero'], $_POST['director'], $_POST['year'], $_POST['sinopsis'], $ruta);
    BDPelicula::modificar($unaPelicula);
    header("Location: index.php");
}

function subir() {

    if (!isset($_FILES["cartel"])) {
        echo "No estoy recibiendo el archivo";
    } elseif ($_FILES["cartel"]["size"] == 0) {
        //Si el tamaño es 0, es porque el archivo no se envía al servidor
        //y puede ser porque supera MAX_FILE_SIZE del formulario o de php.ini
        echo "El archivo no ha llegado correctamente";
    } elseif ($_FILES["cartel"]["type"] != 'image/jpeg') {
        echo "No se permiten archivos diferentes de jpg";
        //Esto no es seguro porque sólo comprueba la extensión del fichero.
    } else {
        //Comprobación del MIME
        $mimeinfo = finfo_open(FILEINFO_MIME);
        if (!$mimeinfo) {
            echo "Por motivos de seguridad no puedo analizar el archivo";
        } else {
            $mimereal = finfo_file($mimeinfo, $_FILES["cartel"]["tmp_name"]);
            //Buscamos en la información del fichero que el mime esté, en este caso 'image/jpeg'
            if (strpos($mimereal, 'image/jpeg') !== 0) {
                echo "El mime real no corresponde. $mimereal";
            } else {
                //Nos podemos fiar completamente que el archivo es una imagen y lo movemos a su sitio
                $ruta = "";
                $ruta = "carteles/" . $_POST["titulo"] . ".jpg";
                if (move_uploaded_file($_FILES["cartel"]["tmp_name"], $ruta)) {
                    return $ruta;
                } else {
                    return null;
                }
            }
        }
    }
}

?>
