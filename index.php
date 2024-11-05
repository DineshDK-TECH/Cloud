<?php
require 'connection.php';

$collection = getMongoDBConnection();
$tasks = $collection->find();

echo "<h2>Task Manager</h2>";
echo "<a href='add.php'>Add New Task</a><br><br>";

echo "<table border='1'>
<tr>
<th>Task Name</th>
<th>Description</th>
<th>Actions</th>
</tr>";

foreach ($tasks as $task) {
    echo "<tr>
        <td>{$task->name}</td>
        <td>{$task->description}</td>
        <td>
            <a href='edit.php?id={$task->_id}'>Edit</a> |
            <a href='delete.php?id={$task->_id}'>Delete</a>
        </td>
    </tr>";
}

echo "</table>";
?>
