<?php
$action = "getUndoneTasks";
require "./taskController.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./assets/img/logo.png" type="image/x-icon">

    <title>To Do List</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="./assets/img/logo.png" alt="logo" class="logo">
                SuperToDo</a>
        </div>
    </nav>

    <div class="container app">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 menu">
                <ul>
                    <li class="list-group-item active"><a href="#">Tarefas Pendentes</a></li>
                    <li class="list-group-item"><a href="./newTasks.php">Nova Tarefa</a></li>
                    <li class="list-group-item"><a href="./allTasks.php">Todas as Tarefas</a></li>
                </ul>
            </div>

            <div class="col-5 col-md-7 col-lg-8">
                <div class="container page">
                    <div class="row">
                        <div class="col">
                            <h4> Tarefas Pendentes</h4>
                            <hr>
                            <?php foreach ($tasks as $index => $task) { ?>
                                <div class="row d-flex space-between">
                                    <div class="tasks mb-4 col-6">
                                        <?= $task->task ?> (<?= $task->status ?>)
                                    </div>
                                    <div class="btns row col-6">

                                        <form class="formEdit bg-light me-1" action="taskEditor.php?id=<?= $task->id ?>" method="POST">
                                            <button class="bt bg-light col-1 mt-2 d-flex justify-content-center">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>

                                        <form class="formConfirm bg-success me-1" action="./taskController.php?action=markAsDone&id=<?= $task->id ?>" method="POST">
                                            <button class="bt bg-success col-1 mt-2 d-flex justify-content-center">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>

                                        <form class="formDelete bg-danger me-1" action="./taskController.php?action=deleteTask&id=<?= $task->id ?>" method="POST">
                                            <button class="bt bg-danger col-1 mt-2 d-flex justify-content-center">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>