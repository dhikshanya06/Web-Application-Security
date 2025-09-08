<?php
$servername = "localhost";
$username = "root";  // default in XAMPP
$password = "";
$dbname = "guestbook_db";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO guestbook_entries (name, message) VALUES ('$name', '$message')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head><title>Guestbook</title></head>
<body>
<h2>Leave a Message</h2>
<form method="POST" action="">
    Name: <input type="text" name="name" required><br><br>
    Message: <textarea name="message" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<h2>Recent Messages</h2>
<?php
$result = $conn->query("SELECT * FROM guestbook_entries ORDER BY created_at DESC LIMIT 5");
while ($row = $result->fetch_assoc()) {
    echo "<p><b>" . htmlspecialchars($row['name']) . ":</b> " . htmlspecialchars($row['message']) . " <i>(" . $row['created_at'] . ")</i></p>";
}
$conn->close();
?>
</body>
</html>
