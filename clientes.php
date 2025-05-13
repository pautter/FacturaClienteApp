<?php
require_once 'conexion.php';

// Crear cliente
function registrarCliente($nombre, $cedula, $telefono1, $telefono2, $correo, $direccion) {
    global $pdo;
    $sql = "INSERT INTO clientes (nombre, cedula, telefono1, telefono2, correo, direccion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nombre, $cedula, $telefono1, $telefono2, $correo, $direccion]);
}

// Leer clientes
function obtenerClientes() {
    global $pdo;
    $sql = "SELECT * FROM clientes";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Eliminar cliente
function eliminarCliente($id) {
    global $pdo;
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

// Buscar cliente por cédula
function buscarClientePorCedula($cedula) {
    global $pdo;
    $sql = "SELECT * FROM clientes WHERE cedula = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cedula]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Buscar cliente por telefono
function buscarClientePorTelefono($telefono1) {
    global $pdo;
    $sql = "SELECT * FROM clientes WHERE telefono1 = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$telefono1]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<style>
    .ingr{
        width: 75%;
        margin: 3px;
    }
    .tabl{
        width: 100%;
        align-content: center;
        text-align: center;
        }
    .formu{
        text-align: justify;
        margin-left:25%;
    }
</style>
<body >
    
    
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
    

<center>
    <div class="bg-light ">
        <img src="assets/img/logo2.png" style="width:500px">
        <h1>Registro de Clientes</h1>
        <div>
            <div>
                <div class="formu">
                    <form action="procesar.php" method="post" >
                        <input type="hidden" name="id" value="">
                        <label>Nombre:</label>
                            <br><input class="ingr" type="text" name="nombre"><br>
                        <label>Cédula:</label>
                            <br><input class="ingr" type="text" name="cedula"><br>
                        <label>Teléfono 1:</label>
                            <br><input class="ingr" type="text" name="telefono1"><br>
                        <label>Teléfono 2:</label>
                            <br><input class="ingr" type="text" name="telefono2"><br>
                        <label>Correo:</label>
                            <br><input class="ingr" type="email" name="correo"><br>
                        <label>Dirección:</label>
                            <br><textarea class="ingr" rows="3" name="direccion"></textarea><br>
                        <button type="submit" name="accion" value="registrar" class="bton">Registrar</button>
                    
                        
                    </form>
                </div>

                <div>
                    <h2>Búsqueda de Cliente por Cédula</h2>
                        <form action="clientes.php" method="get">
                            <label>Cédula:</label>
                            <input type="text" name="cedula_buscar">
                            <button type="submit">Buscar</button>
                        </form>
                    <h2>Búsqueda de Cliente por telefono</h2>
                        <form action="clientes.php" method="get">
                            <label>Telefono:</label>
                            <input type="text" name="telefono_buscar">
                            <button type="submit">Buscar</button>
                        </form>
                </div>
            </div>
        </div>

        <h2>Lista de Clientes</h2>
        <div class="p-5 ">
        <table border="1" class="tabl">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono 1</th>
                <th>Teléfono 2</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
            <?php
            $clientes = [];
            
            // Verificar si se ha enviado una cédula para buscar
            if (isset($_GET['cedula_buscar']) && $_GET['cedula_buscar'] !== '') {
                $cedula = $_GET['cedula_buscar'];
                $clientes = buscarClientePorCedula($cedula);
                
                if (empty($clientes)) {
                    echo "<tr><td colspan='8'>No se encontró ningún cliente con esa cédula.</td></tr>";
                }
            } else {
                // Obtener todos los clientes si no se está buscando uno específico
                $clientes = obtenerClientes();
            }

            foreach ($clientes as $cliente) {
                echo "<tr>
                        <td>{$cliente['id']}</td>
                        <td>{$cliente['nombre']}</td>
                        <td>{$cliente['cedula']}</td>
                        <td>{$cliente['telefono1']}</td>
                        <td>{$cliente['telefono2']}</td>
                        <td>{$cliente['correo']}</td>
                        <td>{$cliente['direccion']}</td>
                        <td>
                            <form action='procesar.php' method='post' style='display:inline'>
                                <input type='hidden' name='id' value='{$cliente['id']}'>
                                <button type='submit' class='btn btn-outline-danger' name='accion' value='eliminar'>✖</button>
                            </form>
                        </td>
                    </tr>";
            }
            ?>
        </table>
        </div>
    </div>
</center>
</body>
</html>