<?php
// Configura tu correo receptor
$destinatario = "morwisolucionesinmobiliaria@gmail.com" // <- Cambiar por tu correo
$asunto = "Nuevo formulario de propiedad desde Morwi Soluciones Inmobiliaria, formulario para publicar una propiedad";

// Verificar que se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $dimensiones = htmlspecialchars($_POST['dimensiones']);
    $operacion = htmlspecialchars($_POST['operacion']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $otros = htmlspecialchars($_POST['otros']);
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $ubicacion = htmlspecialchars($_POST['ubicacion']);
    $precio = htmlspecialchars($_POST['precio']);

    // Construir el mensaje
    $mensaje = "
    <h2>Nuevo formulario de propiedad</h2>
    <p><strong>Nombre:</strong> $nombre</p>
    <p><strong>Correo:</strong> $correo</p>
    <p><strong>Teléfono:</strong> $telefono</p>
    <p><strong>Tipo de propiedad:</strong> $tipo</p>
    <p><strong>Dimensiones:</strong> $dimensiones</p>
    <p><strong>Operación:</strong> $operacion</p>
    <p><strong>Descripción:</strong> $descripcion</p>
    <p><strong>Otros detalles:</strong> $otros</p>
    <p><strong>Ciudad:</strong> $ciudad</p>
    <p><strong>Ubicación:</strong> $ubicacion</p>
    <p><strong>Precio:</strong> $precio</p>
    ";

    // Encabezados del correo
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $nombre <$correo>\r\n";

    // Enviar correo
    if(mail($destinatario, $asunto, $mensaje, $headers)){
        echo "<script>alert('Formulario enviado correctamente.'); window.location='index.html';</script>";
    } else {
        echo "<script>alert('Error al enviar el formulario. Intenta nuevamente.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido.";
}
?>
