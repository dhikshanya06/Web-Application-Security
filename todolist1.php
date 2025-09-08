<?php
$user = "root";
$password = "";
$database = "cysaa";
$table = "food";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  $result =   $db->query("SELECT food FROM $table");
  while(  $row= $result->fetch()) {
    echo "<li>" . htmlspecialchars($row['food']) . "</li>";
  }
  echo "</ol>";
  echo "<br>";
  
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
