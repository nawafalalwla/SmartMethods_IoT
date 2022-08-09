<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "sensor";
// REPLACE with Database user
$username = "user";
// REPLACE with Database user password
$password = "password";

if (isset($_GET["value"])) {
    $value = test_value($_GET["value"]);

    if (!ctype_digit($value)) {
        die("value must be an integer");
    }
    // Create connection
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "INSERT INTO sensor (value) VALUES ($value)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } catch (Exception $e) {
        echo "Connection error";
    }
} else {
    echo "error: no value in the HTTP";
}

function test_value($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}