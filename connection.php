<?php
require 'vendor/autoload.php';  // Load MongoDB PHP library

function getMongoDBConnection() {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    return $client->task_manager->tasks;  // Connect to "task_manager" database and "tasks" collection
}
?>
