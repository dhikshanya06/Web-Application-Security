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
        // Collect value of input field
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);

        if (!empty($username) && !empty($email)) {
            echo "<h1>Hi " . $username . " and your mail id is " . $email . "</h1>";
        } else {
            echo "<h1>Error: Username and Email ID are required.</h1>";
        }
    } else {
        echo "<h1>Invalid request method. Please submit the form.</h1>";
    }
    ?>
</body>
</html>
