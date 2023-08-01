<?php

// Connect to database function
function connectDb($id20444493_formulariod) {
    $servername = "localhost";
    $username = "id20444493_root";
    $password = "MBq~6WZsnp5W4N";

    try {
        $dsn = "mysql:host=localhost;dbname=$id20444493_formulariod";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    } catch (PDOException $e) {
        exit("Connection failed: " . $e->getMessage());
    }
}

// Sanitize and validate user input function
function clean_input($input, $datatype) {
    switch ($datatype) {
        case 'int':
            return filter_var($input, FILTER_VALIDATE_INT);
        case 'str':
            return filter_var($input, FILTER_SANITIZE_STRING);
        case 'date':
            // Explicitly specify date format using DateTime()
            $date = new DateTime(filter_input(INPUT_POST, $input, FILTER_SANITIZE_STRING));
            return $date->format('Y-m-d');
        default:
            return "Datos invalidos!";
    }
}

// If form submitted via POST method
if ($id20444493_formulariod["REQUEST_METHOD"] == "POST") {.

    // Validate and sanitize user input
    $nombre = clean_input('nombre', 'str');
    $apellido = clean_input('apellido', 'str');
    $date = clean_input('date', 'date');
    $num_persons = clean_input('num_persons', 'int');
    $hora = clean_input('hora', 'str');
    $phone = clean_input('phone', 'str');
    $municipio = clean_input('municipio', 'str');
    $asunto = clean_input('asunto', 'str');

    // Check if all inputs are valid
    $valid_inputs = !(!$nombre || !$apellido || !$date || !$num_persons || !$hora || !$phone || !$municipio || !$asunto);

    if ($valid_inputs) {

        // Get database connection
        $pdo = connectDb($id20444493_formulariod);

        // Prepare the SQL statement with named parameters
        $stmt = $pdo->prepare("INSERT INTO $id20444493_formulariod (nombre, apellido, date, num_persons, hora, phone, municipio, asunto) VALUES (:nombre, :apellido, :date, :num_persons, :hora, :phone, :municipio, :asunto)");

        // Bind values to named parameters and execute statement
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':date' => $date,
            ':num_persons' => $num_persons,
            ':hora' => $hora,
            ':phone' => $phone,
            ':municipio' => $municipio,
            ':asunto' => $asunto
        ]);

        // Check if insert was successful
        if ($stmt->rowCount() > 0) {
            echo "Datos enviados correctamente";
        } else {
            echo "Ha fallado su petición, reingrese los datos correctamente";
        }

        // Close the connection
        $pdo = null;

    } else {
        echo "Datos invalidos, por favor ingrese los datos correctamente";
    }
}

?>
