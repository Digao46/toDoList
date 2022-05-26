<?php

require 'connection.php';
require_once 'taskModel.php';
require_once 'taskService.php';

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$conn = new Connection();
$task = new Task();
$taskService = new TaskServices($conn);

if ($action == 'insert') {
    $task->__set('task', $_POST['task']);
    $taskService->insert($task);
    header('Location: newTasks.php?included=1');
} else if ($action == 'getTasks') {
    $tasks = $taskService->getTasks();
} else if ($action == 'getUndoneTasks') {
    $tasks = $taskService->getUndoneTasks();
} else if ($action == 'deleteTask' && $id != null) {
    $taskService->delete($id);
    header('Location: allTasks.php');
} else if ($action == 'markAsDone' && $id != null) {
    $taskService->markAsDone($id);
    header('Location: index.php');
} else if ($action == 'editTask' && $id != null) {
    $newName = $_POST['taskName'];
    $taskService->editTask($id, $newName);
    header('Location: index.php');
};
