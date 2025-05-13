<?php
require_once 'conexion.php';

$cliente = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo "<p style='color: red;'>No se encontró un cliente con el ID proporcionado.</p>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factura automatica</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2557/2557649.png" type="image/png">
    <!--LETRA-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
</head>
<body class=" "> 
<div class="d-flex flex-column">
  <div class=" control-bar mb-5">
    <div class="">
      <div class="col">
          <div class="col slogan">Facturación </div>
            <div class="col">
              <label for="config_tax">IVA:
                <input type="checkbox" id="config_tax" />
              </label>
              <label for="config_tax_rate" class="taxrelated">Tasa:
                <input type="text" id="config_tax_rate" value="13"/>%
              </label>
              <label for="config_note">Nota:
                <input type="checkbox" id="config_note" />
              </label>
            </div>
            
            <div class="col">
              <a href="javascript:window.print()"><img src="https://png.pngtree.com/png-vector/20231211/ourmid/pngtree-print-icon-text-print-png-image_10873590.png" width="15px"></a>
              <!-- Agregado: Botón para devolverse al index.php -->
              <a href="index.php" class="btn-back"><img src="https://cdn.icon-icons.com/icons2/2551/PNG/512/login_icon_152813.png" width="15px"></a>
              <!-- Agregado: Botón para abrir calculadora -->
              <a href="#" data-bs-toggle="modal" data-bs-target="#calculadora"><img src="https://cdn.icon-icons.com/icons2/272/PNG/512/Calculator_30001.png" width="15px"> </a>
            </div>
      </div><!--.row-->
    </div><!--.container-->
  </div><!--.control-bar-->

  <header class=" mt-5">
    <div class=" col" >
      <img src="assets/img/logo.png" width="100px">
    </div><!--.logoholder-->

    <div class=" col">
      <p >
        <strong>Fabrica de muebles HV</strong><br>
        Calle 7 #13-50 San Rafael<br>
        Piedecuesta - Santander.<br>
        
      </p>
    </div><!--.me-->

    <div class="col">
      <p >
        <b>E-mail:</b> muebleshvpiedecuesta@gmail.com<br>
        <b>Tel:</b> +321 3722608<br>
        <b>Instagram:</b> @fabricademuebleshv
      </p>
    </div><!-- .info -->

    <div class="col">
      <p >
        <b>Datos bancarios: <br></b>
        <b>Titular:</b> Paula Hurtado <br>
        <b>CC:</b> 1005541932<br>
        <b>Cuenta:</b>78049254732
      </p>
    </div><!--.bank-->

  </header>


  <div class="d-flex flex-column row mb-3">

    <div class="row">
      <h1>FACTURA</h1>
    </div><!--.col-->
    
    <div class="row border-bottom border-secondary">
      <div class="col">
        <div >
          <strong>Facturar a</strong><br>
          <p><?= htmlspecialchars($cliente['nombre']) ?><br>
          <?= htmlspecialchars($cliente['cedula']) ?><br>
          <?= htmlspecialchars($cliente['telefono1']) ?> / <?= htmlspecialchars($cliente['telefono2']) ?><br>
          <?= htmlspecialchars($cliente['correo']) ?><br>
          <?= htmlspecialchars($cliente['direccion']) ?><br></p>
            </div>
      </div><!--.col-->

      <div class="col d-flex justify-content-end">
        <p >
              Fecha: 
              <input type="text" class="border border-0 datePicker" style="width:100px;"/><br>
              Factura: 
              <input type="text" value="100" class="border border-0" style="width:100px;"/><br>
              Vence: 
              <input class="border border-0 twoweeks" type="text"style="width:100px;"/>
          </p>
      </div><!--.col-->
    </div>  

  </div><!--.row-->

<center>
  <div class="col table" style='width:100%'>
    <div class="">
      <table>
        <thead >
          <tr class="invoice_detail">
              <th width="25%" style="text-align: center;"> Vendedor</th>
              <th width="25%">Orden de compra </th>
              <th width="20%">Enviar por</th>
              <th width="30%">Términos y condiciones</th>
          </tr> 
        </thead>
        <tbody contenteditable>
          <tr class="invoice_detail">
              <td width="25%" style="text-align:center;">Paula Hurtado</td>
              <td width="25%">dma(0-M-0) </td>
              <td width="20%">DHL</td>
              <td width="30%">50% para producción y 50% envió</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!--.row-->
</center>
  <div class="invoicelist-body">
    <table>
      <thead >
        <th width="5%">Código</th>
        <th width="60%">Descripción</th>
        
        <th width="10%">Cant.</th>
        <th width="15%">Precio</th>
        <th class="taxrelated">IVA</th>
        <th width="10%">Total</th>
      </thead>
      <tbody>
        <tr>
          <td width='5%'><a class="control removeRow" href="#">x</a> <span contenteditable>12345</span></td>
          <td width='60%'><span contenteditable>Descripción</span></td>
          <td class="amount"><input type="text" value="1"/></td>
          <td class="rate"><input type="text" value="99" /></td>
          <td class="tax taxrelated"></td>
          <td class="sum"></td>
        </tr>
      </tbody>
    </table>
    <a class="control newRow" href="#">+ Nueva fila</a>
  </div><!--.invoice-body-->

  <div class="invoicelist-footer">
    <table >
      <tr class="taxrelated">
        <td>IVA:</td>
        <td id="total_tax"></td>
      </tr>
      <tr>
        <td><strong>Total:</strong></td>
        <td id="total_price"></td>
      </tr>
    </table>
  </div>

  <div class="note" contenteditable>
    <h2>Nota:</h2>
  </div><!--.note-->

  <footer class="row">
    <div class="col text-center">
      <p class="notaxrelated">El monto de la factura no incluye el impuesto sobre las ventas.</p>
      
    </div>
  </footer>
</div>

<!-- Modal para calculadora de muebles -->
<div class="modal fade" id="calculadora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4" id="calculadoraContent">
            <h1>Calcular Precio del Mueble</h1>
            
            <!-- Selección de tipo de cálculo -->
            <label for="tipoCalculo">Seleccione el tipo de cálculo:</label>
            <select id="tipoCalculo" class="form-control mb-3">
                <option value="personalizado">Personalizado</option>
                <option value="metro_lineal">Metro Lineal</option>
                <option value="metro_cuadrado">Metro Cuadrado</option>
            </select>

            <!-- Inputs para cálculo personalizado -->
            <div id="personalizado" class="calculo-opcion" style="display:none;">
                <label for="precioPersonalizado">Precio base:</label>
                <input type="number" id="precioPersonalizado" class="form-control mb-2" placeholder="Ingrese el precio base">
                
                <label for="porcentajeAumento">Porcentaje de aumento (%):</label>
                <input type="number" id="porcentajeAumento" class="form-control mb-2" placeholder="Ingrese el porcentaje de aumento">
                
                <button class="btn btn-primary mt-2" onclick="calcularPersonalizado()">Calcular</button>
            </div>

            <!-- Inputs para cálculo por metro lineal -->
            <div id="metro_lineal" class="calculo-opcion" style="display:none;">
                <label for="medidaLineal">Medida general:</label>
                <input type="number" id="medidaLineal" class="form-control mb-2" placeholder="Ingrese la medida">
                
                <label for="valorMaterialLineal">Valor del material:</label>
                <input type="number" id="valorMaterialLineal" class="form-control mb-2" placeholder="Ingrese el valor del material">
                
                <button class="btn btn-primary mt-2" onclick="calcularMetroLineal()">Calcular</button>
            </div>

            <!-- Inputs para cálculo por metro cuadrado -->
            <div id="metro_cuadrado" class="calculo-opcion" style="display:none;">
                <label for="anchoCuadrado">Ancho:</label>
                <input type="number" id="anchoCuadrado" class="form-control mb-2" placeholder="Ingrese el ancho">
                
                <label for="altoCuadrado">Alto:</label>
                <input type="number" id="altoCuadrado" class="form-control mb-2" placeholder="Ingrese el alto">
                
                <label for="valorMaterialCuadrado">Valor del material:</label>
                <input type="number" id="valorMaterialCuadrado" class="form-control mb-2" placeholder="Ingrese el valor del material">
                
                <button class="btn btn-primary mt-2" onclick="calcularMetroCuadrado()">Calcular</button>
            </div>

            <!-- Resultado del cálculo -->
            <div id="resultadoCalculo" class="mt-3"></div>
            
            <div class="text-center mt-4">
                <button class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tipoCalculo').addEventListener('change', function() {
        const opciones = document.querySelectorAll('.calculo-opcion');
        opciones.forEach(opcion => opcion.style.display = 'none');
        document.getElementById(this.value).style.display = 'block';
    });

    function calcularPersonalizado() {
        const precio = parseFloat(document.getElementById('precioPersonalizado').value) || 0;
        const porcentaje = parseFloat(document.getElementById('porcentajeAumento').value) || 0;
        const resultado = precio + (precio * porcentaje / 100);
        mostrarResultado(resultado);
    }

    function calcularMetroLineal() {
        const medida = parseFloat(document.getElementById('medidaLineal').value) || 0;
        const valorMaterial = parseFloat(document.getElementById('valorMaterialLineal').value) || 0;
        const resultado = medida * valorMaterial * 1.3;
        mostrarResultado(resultado);
    }

    function calcularMetroCuadrado() {
        const ancho = parseFloat(document.getElementById('anchoCuadrado').value) || 0;
        const alto = parseFloat(document.getElementById('altoCuadrado').value) || 0;
        const valorMaterial = parseFloat(document.getElementById('valorMaterialCuadrado').value) || 0;
        const resultado = ancho * alto * valorMaterial * 1.3;
        mostrarResultado(resultado);
    }

    function mostrarResultado(resultado) {
        document.getElementById('resultadoCalculo').innerHTML = `<h3>Resultado: $${resultado.toFixed(2)}</h3>`;
    }
</script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
  <script src="assets/js/main.js"></script>
</body>

</html>