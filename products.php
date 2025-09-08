<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$search = "";
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Product Search</title></head>
<body>
<h2>Search Products</h2>
<form method="GET" action="">
    <input type="text" name="search" placeholder="Enter keyword..." value="<?php echo htmlspecialchars($search); ?>">
    <input type="submit" value="Search">
</form>

<h2>Product List</h2>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><b>" . htmlspecialchars($row['name']) . "</b> - " . htmlspecialchars($row['description']) . " - $" . $row['price'] . "</p>";
    }
} else {
    echo "No products found.";
}
$conn->close();
?>
</body>
</html>
