<?php
$destinatario = "morwisolucionesinmobiliaria.com"; // 👈 CAMBIAR
$asunto = "Nuevo contacto - Morwi Soluciones Inmobiliarias";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre  = trim($_POST["nombre"]);
    $celular = trim($_POST["celular"]);
    $correo  = trim($_POST["correo"]);
    $mensaje = trim($_POST["mensaje"]);

    if(!$nombre || !$celular || !$correo || !$mensaje){
        exit("Faltan datos");
    }

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        exit("Correo inválido");
    }

    $contenido = "
Nombre: $nombre
Celular: $celular
Correo: $correo

Mensaje:
$mensaje
";

    $headers = "From: Morwi Web <$correo>\r\n";
    $headers .= "Reply-To: $correo\r\n";

    mail($destinatario, $asunto, $contenido, $headers);

    header("Location: gracias.html");
}
?>
