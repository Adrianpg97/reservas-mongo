<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class BDPelicula {

            //metodos de basede datos
            public static function mostrar() {
                $dbh = Db::conectar();

                $coleccion = $dbh->peliculasMongo;
                $cursor = $coleccion->find();
                $listaPeliculas = [];

                foreach ($cursor as $documento) {
                    $miPelicula = new Pelicula($documento["_id"], $documento["director"], $documento["genero"], $documento["portada"], $documento["sinopsis"], $documento["titulo"], $documento["year"]);
                    $listaPeliculas[] = $miPelicula;
                }
                $dbh = null;
                return $listaPeliculas;
            }
            public static function mostrarPorId($unId) {
                $dbh = Db::conectar();
                $listaPeliculas = [];
                $coleccion = $dbh->peliculasMongo;
                $cursor = $coleccion->find(['_id' => new \MongoDB\BSON\ObjectId($unId)]);
                foreach ($cursor as $pelicula) {
                    $miPelicula = new Pelicula($pelicula["_id"], $pelicula["director"], $pelicula["genero"], $pelicula["portada"], $pelicula["sinopsis"], $pelicula["titulo"], $pelicula["year"]);
                    $listaPeliculas[] = $miPelicula;
                }
                $dbh = null;
                return $listaPeliculas[0];
            }

            public static function eliminar($idPelicula) {
                $dbh = Db::conectar();

                $coleccion = $dbh->peliculasMongo;
                $coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idPelicula)]);
                $dbh = null;
            }
            
            //insertar una pelicula
            public static function insertar($unaPelicula) {
                $dbh = Db::conectar();
                $coleccion = $dbh->peliculas;

                $documento = array(
                    "director" => $unaPelicula->getDirector(),
                    "genero" => $unaPelicula->getGenero(),
                    "portada" => $unaPelicula->getCartel(),
                    "sinopsis" => $unaPelicula->getSinopsis(),
                    "titulo" => $unaPelicula->getTitulo(),
                    "year" =>$unaPelicula->getYear()

                );

                $coleccion->insertOne($documento);
                $dbh = null;
            }
            
            //Se modifica una pelicuña pasandole un objeto pelicula con los valores a modificar
            public static function modificar($unaPelicula) {
                $dbh = Db::conectar();
                $coleccion = $dbh->peliculasMongo;
                BDPelicula::eliminar($unaPelicula->getId());
                $documento = array(
                    "director" => $unaPelicula->getDirector(),
                    "genero" => $unaPelicula->getGenero(),
                    "portada" => $unaPelicula->getCartel(),
                    "sinopsis" => $unaPelicula->getSinopsis(),
                    "titulo" => $unaPelicula->getTitulo(),
                    "year" =>$unaPelicula->getYear()

                );

                $coleccion->insertOne($documento);
                $dbh = null;

            }
            
            //Muestra las criticas de una pelicula por el id_pelicula
            public static function mostrarCriticas($unId) {
                $dbh = Db::conectar();

                try {
                    $stml = $dbh->prepare('SELECT * FROM critica WHERE id_pelicula=:id');
                    $stml->bindValue(":id", $unId);
                    $stml->execute();
                    $misCriticas = array();
                    $criticas = $stml->fetchAll(PDO::FETCH_OBJ);
                    foreach ($criticas as $critica) {
                        $miCritica = new Critica(0, $critica->id_pelicula, $critica->autor, $critica->texto, $critica->nota);
                        $misCriticas[] = $miCritica;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                $dbh = null;
                return $misCriticas;
            }
        }
        ?>
    </body>
</html>
