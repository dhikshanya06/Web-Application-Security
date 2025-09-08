<?php
$products = array(
    array('name' => 'Product A', 'price' => 19.99),
    array('name' => 'Product B', 'price' => 29.99),
    array('name' => 'Product C', 'price' => 14.99)
);

// Tell the browser that the response is JSON
header('Content-Type: application/json');

// Convert PHP array to JSON and send
echo json_encode($products);
?>
