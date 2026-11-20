<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Generador de Nombres de Usuario</h2>
    <form method="POST" action="">
        Nombre completo: <input type="text" name="nombre" required><br><br>
        Institucion educativa: <input type="text" name="institucion" required><br><br>
        Anio de ingreso (4 digitos): <input type="text" name="anio" maxlength="4" required><br><br>
        <input type="submit" value="Generar Usuario">
    </form>

    <?php
    function limpiarNombre($nombre) {
        $sinOrillas = trim($nombre);
        $sinEspacios = str_replace(" ", "", $sinOrillas);
        return $sinEspacios;
    }

    function convertirMinusculas($texto) {
        return strtolower($texto);
    }

    function obtenerInstitucion($institucion) {
        $limpia = trim($institucion);
        return substr($limpia, 0, 2);
    }

    function obtenerAnio($anio) {
        $limpio = trim($anio);
        return substr($limpio, 2, 2);
    }

    function generarUsuario($nombre, $institucion, $anio) {
        if (strlen(trim($nombre)) > 0 && strlen(trim($institucion)) >= 2 && strlen(trim($anio)) == 4) {
            
            $nombreListo = convertirMinusculas(limpiarNombre($nombre));
            $instListo = convertirMinusculas(obtenerInstitucion($institucion));
            $anioListo = obtenerAnio($anio);
            $usuario = $nombreListo . $instListo . $anioListo;
            return $usuario;
        } else {
            return "Por favor, verifica que los datos estén completos.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $institucion = $_POST['institucion'];
        $anio = $_POST['anio'];

        $usuarioGenerado = generarUsuario($nombre, $institucion, $anio);
        echo "<h3>Usuario generado: $usuarioGenerado</h3>";
    }
    ?>
</body>
</html>