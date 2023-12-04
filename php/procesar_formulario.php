<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $email = test_input($_POST["email"]);
    $asunto = test_input($_POST["subject"]);
    $mensaje = test_input($_POST["message"]);

    // Validar la dirección de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "La dirección de correo electrónico no es válida.";
        exit();
    }

    // Guardar en la base de datos (Asegúrate de configurar la conexión antes)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portafoliofinal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO mensajes (email, asunto, mensaje) VALUES ('$email', '$asunto', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje enviado y guardado correctamente.";
        header("Location:http://localhost/PORTAFOLIOPERSONALFINAL/");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Enviar correo electrónico (Asegúrate de configurar la función mail() en tu servidor)
    $to = "tu_correo_destino@example.com";
    $subject = "Nuevo mensaje: $asunto";
    $headers = "From: $email";

    mail($to, $subject, $mensaje, $headers);
} else {
    echo "Acceso no permitido.";
}

// Función para limpiar y validar datos
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
