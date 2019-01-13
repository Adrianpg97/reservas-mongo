<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class Critica {

            private $id;
            private $id_pelicula;
            private $autor;
            private $texto;
            private $nota;

            public function __construct($unId, $unId_pelicula, $unAutor, $unTexto, $unaNota) {
                $this->id = $unId;
                $this->id_pelicula = $unId_pelicula;
                $this->autor = $unAutor;
                $this->texto = $unTexto;
                $this->nota = $unaNota;
            }

            function setId($unId) {
                $this->id = $unId;
            }

            function getId() {
                return $this->id;
            }

            function setId_pelicula($unId_pelicula) {
                $this->id_pelicula = $unId_pelicula;
            }

            function getId_pelicula() {
                return $this->id_pelicula;
            }

            function setAutor($unAutor) {
                $this->autor = $unAutor;
            }

            function getAutor() {
                return $this->autor;
            }

            function setTexto($unTexto) {
                $this->texto = $unTexto;
            }

            function getTexto() {
                return $this->texto;
            }

            function setNota($unaNota) {
                $this->nota = $unaNota;
            }

            function getNota() {
                return $this->nota;
            }
        }
        ?>
    </body>
</html>
