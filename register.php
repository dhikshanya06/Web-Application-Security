<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username exists
    $check = $conn->query("SELECT * FROM users WHERE username='$user' OR email='$email'");
    if ($check->num_rows > 0) {
        $message = "❌ Username or Email already exists!";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
        if ($conn->query($sql)) {
            $message = "✅ Registration successful!";
        } else {
            $message = "❌ Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>User Registration</title></head>
<body>
<h2>Register</h2>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
</form>
<p><?php echo $message; ?></p>
</body>
</html>
