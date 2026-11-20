<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Claves</title>
</head>
<body>
    <h2>Generador de Claves</h2>
    <form method="POST" action="">
        Nombre completo: <input type="text" name="nombre" required><br><br>
        Fecha de nacimiento: <input type="date" name="fecha" required><br><br>
        <input type="submit" value="Generar Clave">
    </form>

    <?php
    function obtenerIniciales($nombre) {
        $nombreLimpio = trim($nombre);
        return substr($nombreLimpio, 0, 3);
    }

    function obtenerAnio($fecha) {
        return substr($fecha, 2, 2);
    }

    function obtenerMesDia($fecha) {
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2); 
        return $mes . $dia;          
    }

    function generarClave($nombre, $fecha) {
        if (strlen(trim($nombre)) > 0 && strlen($fecha) == 10) {
            $iniciales = obtenerIniciales($nombre);
            $anio = obtenerAnio($fecha);
            $mesDia = obtenerMesDia($fecha);
            $clave = strtoupper($iniciales . $anio . $mesDia);
            return $clave;
        } else {
            return "Datos invalidos";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreUsuario = $_POST['nombre'];
        $fechaUsuario = $_POST['fecha'];

        $resultado = generarClave($nombreUsuario, $fechaUsuario);
        echo "<h3>Resultado: $resultado</h3>";
    }
    ?>
</body>
</html>
