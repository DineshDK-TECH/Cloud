<?php
require 'connection.php';

$collection = getMongoDBConnection();
$task_id = new MongoDB\BSON\ObjectId($_GET['id']);

$collection->deleteOne(['_id' => $task_id]);

header("Location: index.php");
exit;
?>
