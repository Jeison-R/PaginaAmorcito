<?php
// Verifica si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Configura el destinatario del correo electrónico
    $to = "majoldgf160@gmail.com"; // Cambia esto con tu dirección de correo electrónico

    // Construye el cuerpo del mensaje
    $email_body = "Nombre: $name\n" .
                  "Correo electrónico: $email\n" .
                  "Asunto: $subject\n" .
                  "Mensaje:\n$message";

    // Establece los encabezados del correo electrónico
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Intenta enviar el correo electrónico
    if (mail($to, $subject, $email_body, $headers)) {
        // Si el correo se envió con éxito, muestra el mensaje de éxito
        echo "success";
    } else {
        // Si ocurrió un error al enviar el correo, muestra un mensaje de error
        echo "error";
    }
} else {
    // Si no se recibió una solicitud POST, redirige al formulario
    header("Location: index.html");
}
?>

