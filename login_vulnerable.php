<?php
// Vulnerable example — DO NOT use in production
ini_set('display_errors',1); error_reporting(E_ALL);

$DB_USER = 'root'; $DB_PASS = ''; $DB_NAME = 'sql_injection_demo';
try {
    $db = new PDO("mysql:host=localhost;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS,
                  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) { die("DB Error: " . $e->getMessage()); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // VULNERABLE: concatenating user input directly into SQL
    $sql = "SELECT * FROM users_vuln WHERE username = '" . $username . "' AND password = '" . $password . "';";
    echo "<p><strong>Executed SQL:</strong> " . htmlspecialchars($sql) . "</p>";

    try {
        $stmt = $db->query($sql); // executing the raw string
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo "<p style='color:green'>Login successful — Hello " . htmlspecialchars($row['username']) . "</p>";
        } else {
            echo "<p style='color:red'>Login failed.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color:red'>Query error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
