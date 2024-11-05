<?php
require 'connection.php';

$collection = getMongoDBConnection();
$task_id = new MongoDB\BSON\ObjectId($_GET['id']);
$task = $collection->findOne(['_id' => $task_id]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $collection->updateOne(
        ['_id' => $task_id],
        ['$set' => ['name' => $name, 'description' => $description]]
    );

    header("Location: index.php");
    exit;
}
?>

<form action="" method="post">
    <label for="name">Task Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $task->name; ?>"><br><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"><?php echo $task->description; ?></textarea><br><br>
    <input type="submit" value="Update">
</form>
