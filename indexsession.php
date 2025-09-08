<?php
// session_start() is called to initialize or resume a session
session_start();

// Check if a session variable "username" is set.If the username is set, it welcomes the user by name.
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  echo "Welcome back, " . $username . "!";
} else {
  // User is not logged in, display a login form
  echo "Please log in: <br>";
  echo "<form action='loginsession.php' method='post'>";
  echo "Username: <input type='text' name='username' required><br>";
  echo "Password: <input type='password' name='password' required><br>";
  echo "<input type='submit' value='Login'>";
  echo "</form>";
}
?>
