
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Aplicaciones de Internet</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center " style="margin-top:50px ;margin-bottom:100px;" >Aplicaciones de Internet</h1>
            <form action="insertar_datos.php" method="post" class="mb-4">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>

                <div class="mb-3">
                 <label for="edad" class="form-label">Edad:</label>
                 <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
                
                <button type="submit" class="btn btn-primary">Agregar Persona</button>
            </form>

          

            <!-- Mostrar la tabla de Person -->
            <table class="table table-striped mx-auto" style="width:500px;">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                    </tr>
                </thead>

                <?php

                        $conn = mysqli_connect('db', 'root', 'test', "dbname");//conexion a host db,usuario root, clave test , base de datos :dbname

                        $query = 'SELECT * From RegistroUsuarios';//consulta-> selecciona todas la columna persona
                        $result = mysqli_query($conn, $query);//resultado de realizar esta consulta a esta conexión

                        while($value = $result->fetch_array(MYSQLI_ASSOC)){//mientras el resultado de la consulta sea valido se recorrera cada elemento de result
                            echo '<tr>';// se imprime una etiqueta vacia que es una fila sobre la que caben varios etiquetas individuales td
                        //    echo '<td><a href="#"></a></td>';
                            foreach($value as $element){
                                echo '<td>' . $element . '</td>';
                            }

                         //   echo '</tr>';
                        }

                        $result->close();
                        mysqli_close($conn);
                    ?>
                    </table>
              
            </table>
        </div>
    </div>
</body>
</html>