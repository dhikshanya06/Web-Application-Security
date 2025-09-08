<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Form Data</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $valid_username = "dhikshu";
        $valid_password = "dhiks17";

        if (!empty($username) && !empty($password)) {
            
            if ($username === $valid_username && $password === $valid_password) {
                echo "<h1>Login successful! Welcome, " . $username . ".</h1>";
            } else {
                echo "<h1>Error: Invalid username or password.</h1>";
            }
        } else {
            echo "<h1>Error: Username and password are required.</h1>";
        }
    } else {
        echo "<h1>Invalid request method. Please submit the form.</h1>";
    }
    ?>
</body>
</html>
