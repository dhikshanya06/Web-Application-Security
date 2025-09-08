<?php
session_start();
// Dummy credentials (for exercise)
$users = [
    "alice" => "alicepass",
    "user"  => "password"
];
// If already logged in, show welcome
if (isset($_SESSION['username'])) {
    $name = htmlspecialchars($_SESSION['username']);
    $loginTime = date("Y-m-d H:i:s", $_SESSION['login_time']);
    echo "<h2>Welcome back, $name</h2>";
    echo "<p>You logged in at: $loginTime</p>";
    echo '<p><a href="logout.php">Logout</a></p>';
    exit;
}
// Handle form submission
$err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';
    if (isset($users[$u]) && $users[$u] === $p) {
        // Successful login
        session_regenerate_id(true); // mitigate session fixation
        $_SESSION['username'] = $u;
        $_SESSION['login_time'] = time();

        header("Location: login_session.php"); // redirect to avoid repost
        exit;
    } else {
        $err = "Invalid credentials.";
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login (Session Demo)</title></head>
<body>
<h2>Login</h2>
<?php if ($err) echo "<p style='color:red;'>".htmlspecialchars($err)."</p>"; ?>
<form method="post" action="">
    Username: <input name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
