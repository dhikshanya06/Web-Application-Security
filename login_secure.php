<?php
ini_set('display_errors',1); error_reporting(E_ALL);
$DB_USER='root'; $DB_PASS=''; $DB_NAME='sql_injection_demo';
try {
  $db = new PDO("mysql:host=localhost;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) { die("DB connect error: ".$e->getMessage()); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Prepared statement — user input never becomes SQL code
  $stmt = $db->prepare("SELECT * FROM users_secure WHERE username = :username");
  $stmt->execute([':username' => $username]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row && password_verify($password, $row['password'])) {
    echo "<p style='color:green'>Secure login successful — Hello ".htmlspecialchars($row['username'])."</p>";
  } else {
    echo "<p style='color:red'>Login failed (secure check).</p>";
  }
}
?>
