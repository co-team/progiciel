<?php

// Include the database connection file
require './config/db.php';

// Function to clean and sanitize input data
function cleanData($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to connect to the database
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "salarie_gestion";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Read the CSV file
$csvFile = 'csv';
$file_handle = fopen($csvFile, 'r');

// Check if the file is opened successfully
if ($file_handle !== FALSE) {

    // Connect to the database
    $conn = connectDB();

    // Loop through each row in the CSV file
    while (($data = fgetcsv($file_handle, 1000, ',')) !== FALSE) {

        // Clean and sanitize the data
        $username = cleanData($data[0]);
       // $email = cleanData($data[1]);
        $password = cleanData($data[1]);
        $role = cleanData($data[2]);

        // Insert data into the database
        $sql = "INSERT INTO utilisateurs (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error inserting record: " . $conn->error . "<br>";
        }
    }

    // Close the database connection
    $conn->close();

    // Close the CSV file
    fclose($file_handle);

} else {
    echo "Error opening the CSV file";
}

?>
<form action="" method="post">
<input type="file" >
    <input type="submit" value="valider">
</form>