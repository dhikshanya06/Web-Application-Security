<?php
// Run this once to create a secure user in users_secure
$DB_USER='root'; $DB_PASS=''; $DB_NAME='sql_injection_demo';
try {
  $db = new PDO("mysql:host=localhost;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) { die("DB connect error: ".$e->getMessage()); }

$username = 'secureadmin1';
$password_plain = 'SecurePass123'; // the password you will use to login
$hash = password_hash($password_plain, PASSWORD_DEFAULT);

// insert if not exists
$stmt = $db->prepare("SELECT id FROM users_secure WHERE username = ?");
$stmt->execute([$username]);
if ($stmt->fetch()) {
    echo "User already exists.";
} else {
    $ins = $db->prepare("INSERT INTO users_secure (username, password) VALUES (?, ?)");
    $ins->execute([$username, $hash]);
    echo "Inserted user: $username (password: $password_plain)";
}
