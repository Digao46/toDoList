<?php

require 'connection.php';
require_once 'taskService.php';
require_once 'taskModel.php';

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id;
}

$conn = new Connection();
$task = new Task();

if ($action == 'insert') {
    $task->__set('task', $_POST['task']);
    $taskService = new TaskServices($conn, $task);
    $taskService->insert();
    header('Location: newTasks.php?included=1');
} else if ($action == 'getTasks') {
    $taskService = new TaskServices($conn, $task);
    $tasks = $taskService->getTasks();
} else if ($action == 'getUndoneTasks') {
    $taskService = new TaskServices($conn, $task);
    $tasks = $taskService->getUndoneTasks();
} else if ($action == 'deleteTask' && $id != null) {
    $taskService = new TaskServices($conn, $task);
    $taskService->delete($id);
    header('Location: allTasks.php');
} else if ($action == 'markAsDone' && $id != null) {
    $taskService = new TaskServices($conn, $task);
    $taskService->markAsDone($id);
    header('Location: index.php');
};