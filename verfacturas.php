<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="assets/css/main.css">
    
</head>
<body>
  <div class="control-bar">
        <div class="container">
            <div class="row">
                <div class="col-1 text-right">
                    <!-- Agregado: Botón para devolverse al index.php -->
                    <a href="index.php" class="btn-back"><img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" width="15px"></a>
                </div><!--.col-->
            </div><!--.row-->
        </div><!--.container-->
  </div><!--.control-bar-->

    <section class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <?php
                //Numero de archivo
                $cont=1;

                // Ruta de la carpeta que deseas visualizar
                $folder_path = 'ARCHIVOS';

                // Obtener la lista de archivos en la carpeta
                $files = scandir($folder_path);

                // Iterar sobre cada archivo
                foreach($files as $file) {
                // Ignorar los directorios . y ..
                    if ($file != '.' && $file != '..') {
                        // Mostrar el nombre del archivo como un enlace
                        echo "<tr>";
                            echo "<td>";
                                echo "$cont";
                            echo "</td>";
                            echo "<td>";
                                echo "
                                <a href='verpdf.php?archivo=$file' target='_blank'>$file</a>
                                ";
                            echo "</td>";
                        echo "</tr>";
                        $cont=$cont+1;
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</section>
</body>
</html>
