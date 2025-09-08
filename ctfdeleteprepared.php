<?php

// **WARNING:** This code stores credentials directly in the script (not secure!)
$db_host = "localhost"; // Replace with your database server hostname
$db_user = "root"; // Replace with your database username
$db_password = ""; // Replace with your database password
$db_name = "CTF"; // Replace with your database name

// **IMPORTANT:** Use prepared statements and parameter binding for security!
/*The SQL query ("DELETE FROM participantdetails WHERE participant_name = :participant_name AND password = :password") is sent to the database separately from the actual values ($participant_name, $password).

The database treats the placeholders (:participant_name, :password) as fixed points for data, not as executable SQL code.

Even if an attacker inputs ' OR 1=1 --  into $participant_name, the database will interpret that entire string as a literal value for the participant_name column, not as an SQL instruction. It will try to find a participant_name that is literally arun' OR '1=1 , which is highly unlikely to exist.*/

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $participant_name = $_POST['participant_name'];
    $password = $_POST['password'];

    
    //$sql = "DELETE FROM participantdetails WHERE participant_name = '$participant_name' AND password = '$password'";

    $sql = "DELETE FROM participantdetails WHERE participant_name = :participant_name AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":participant_name", $participant_name, PDO::PARAM_STR,128);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR,128);
    $stmt->execute();

    // Execute the query (replace with prepared statement execution)
    //$conn->exec($sql);

    echo "Participant record deleted successfully (if credentials matched).";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
