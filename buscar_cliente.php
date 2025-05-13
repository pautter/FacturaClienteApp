<?php
require_once 'conexion.php';

if (isset($_POST['buscar'])) {
    $nombre = $_POST['nombre'];
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE nombre LIKE :nombre");
    $stmt->execute(['nombre' => "%$nombre%"]);

} elseif (isset($_POST['buscar2'])) {
    $cedula = $_POST['cedula'];
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE cedula LIKE :cedula");
    $stmt->execute(['cedula' => "%$cedula%"]);

} else {
    // Si no se hace búsqueda, se listan todos los clientes
    $stmt = $pdo->query("SELECT * FROM clientes");
}

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Cliente</title>
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
    <h1>Buscar Cliente</h1>
    
    <!-- Formulario para buscar clientes por nombre -->
    <form method="post" action="buscar_cliente.php">
        <input type="text" name="nombre" placeholder="Nombre del cliente">
        <button type="submit" name="buscar">✔</button>
    </form>
    
    <!-- Formulario para buscar clientes por cédula -->
    <form method="post" action="buscar_cliente.php">
        <input type="text" name="cedula" placeholder="Cédula del cliente">
        <button type="submit" name="buscar2">✔</button>
    </form>

    <!-- Botón para mostrar todos los clientes -->
    <form method="post" action="buscar_cliente.php">
        <button type="submit" name="mostrar_todos" class="botonc">Mostrar Todos los Clientes</button>
    </form>

    <!-- Tabla de clientes -->
    <h2>Listado de Clientes</h2>
    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['id']) ?></td>
                    <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                    <td><?= htmlspecialchars($cliente['cedula']) ?></td>
                    <td><?= htmlspecialchars($cliente['telefono1']) ?></td>
                    <td><?= htmlspecialchars($cliente['correo']) ?></td>
                    <td><?= htmlspecialchars($cliente['direccion']) ?></td>
                    <td>
                        <!-- Botón para crear factura -->
                        <a href="factura.php?id=<?= $cliente['id'] ?>">Facturar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
