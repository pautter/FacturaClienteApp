<?php
require_once 'clientes.php';;

$accion = $_POST['accion'] ?? '';
$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'] ?? '';
$cedula = $_POST['cedula'] ?? '';
$telefono1 = $_POST['telefono1'] ?? '';
$telefono2 = $_POST['telefono2'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';

if ($accion === 'registrar') {
    registrarCliente($nombre, $cedula, $telefono1, $telefono2, $correo, $direccion);
} elseif ($accion === 'modificar' && $id) {
    modificarCliente($id, $nombre, $cedula, $telefono1, $telefono2, $correo, $direccion);
} elseif ($accion === 'eliminar' && $id) {
    eliminarCliente($id);
}

header("Location: clientes.php");
exit();
?>
