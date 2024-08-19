<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validar que el teléfono contenga solo números
    if (!preg_match('/^\d{10}$/', $phone)) {
        echo "El número de teléfono no es válido.";
        exit;
    }
    
    // Aquí puedes enviar un email, guardar en una base de datos, etc.
    // Ejemplo de enviar un email:
    $to = "juniorprofe24@gmail.com"; // Reemplaza esto con tu dirección de correo
    $subject = "Nuevo mensaje de contacto: $subject";
    $body = "Nombre: $name\nNúmero de Teléfono: $phone\nEmail: $email\nMensaje:\n$message";
    $headers = "From: no-reply@tusitio.com";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>