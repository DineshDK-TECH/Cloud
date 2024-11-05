<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $collection = getMongoDBConnection();
    $collection->insertOne(['name' => $name, 'description' => $description]);

    header("Location: index.php");
    exit;
}

include 'form.html';
?>
