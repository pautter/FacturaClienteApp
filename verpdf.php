<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/pdf.css">
    <title>Visor de PDF</title>
</head>
<body>
    <?php
    // Obtener el nombre del archivo de la URL
    $archivo = isset($_GET['archivo']) ? $_GET['archivo'] : '';

    if (!empty($archivo)) {
        // Mostrar el archivo PDF
        echo "<embed src='ARCHIVOS/$archivo' type='application/pdf' width='100%' height='600px'>";
    } else {
        // Mostrar un mensaje de error si no se proporcionó un nombre de archivo válido
        echo "Error: No se proporcionó un archivo válido.";
    }
    ?>
</body>
</html>
