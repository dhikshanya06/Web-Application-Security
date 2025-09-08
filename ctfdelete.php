<?php
//This code is to delete a record of one particular participant with knowing only the participant name but without knowing the password
$db_host = "localhost"; // Replace with your database server hostname
$db_user = "root"; // Replace with your database username
$db_password = ""; // Replace with your database password
$db_name = "ctf"; // Replace with your database name

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets the error handling mode for a PDO connection in PHP

    $participant_name = $_POST['participant_name'];
    $password = $_POST['password'];

    $sql = "DELETE FROM participantdetails WHERE participant_name = '$participant_name' AND password = '$password'";
    DELETE FROM participantdetails WHERE participant_name = 'arun' OR '1=1' AND password = 'random_password' 
    $conn->exec($sql);
    echo "Participant record deleted successfully (if credentials matched).";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
