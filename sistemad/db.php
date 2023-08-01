
<?php
// Connect to database
$servername = "localhost5";
$username = " root@localhost ";
$password = "MBq~6WZsnp5W)4N';
$dbname = 'formularioD";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fecha = $_POST["fecha"];
$num_persons = $_POST["num_persons"];
$hora = $_POST["hora"];
$telefono = $_POST["telefono"];
$municipio = $_POST["municipio"];
$asunto = $_POST["asunto"];

// Insert data into table
$sql = "INSERT INTO data (nombre, apellido, fecha, num_persons, hora, telefono, municipio, asunto)
        VALUES ('$nombre', '$apellido', '$fecha', '$num_persons', '$hora', '$telefono', '$municipio', '$asunto')";

if (mysqli_query($conn, $sql)) {
    echo "Datos Enviados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>