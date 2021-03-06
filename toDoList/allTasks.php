<?php
$action = "getTasks";
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

    <title>To Do List - All Tasks</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php">
                <img src="./assets/img/logo.png" alt="logo" class="logo">
                SuperToDo</a>
        </div>
    </nav>

    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1) : ?>
        <div class="pt-2 text-white d-flex justify-content-center confirmation">
            <h5>
                Tarefa Excluída com Sucesso!
            </h5>
        </div>
    <?php endif; ?>

    <div class="container app">
        <div class="row">
            <div class="col-12 col-md-4 menu">
                <ul class="ps-2 pe-2">
                    <li class="list-group-item "><a href="./index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item"><a href="newTasks.php">Nova Tarefa</a></li>
                    <li class="list-group-item active"><a href="#">Todas as Tarefas</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-8">
                <div class="container page">
                    <div class="row">
                        <div class="col">
                            <h4> Todas as Tarefas</h4>
                            <hr>
                            <?php foreach ($tasks as $index => $task) { ?>
                                <div class="row d-flex space-between">
                                    <div class="tasks col-5 col-md-6 mb-4">
                                        <?= $task->task ?> (<?= $task->status ?>)
                                    </div>

                                    <div class="btns col-7 col-md-6">
                                        <?php if ($task->status == 'pendente') { ?>
                                            <form class="formEdit bg-light me-1" action="taskEditor.php?id=<?= $task->id ?>" method="POST">
                                                <button class="bt bg-light h-100 w-100">
                                                    <i class="fa fa-pencil fa-lg d-flex justify-content-center"></i>
                                                </button>
                                            </form>

                                            <form class="formConfirm bg-success me-1" action="./taskController.php?action=markAsDone&id=<?= $task->id ?>" method="POST">
                                                <button class="bt bg-success h-100 w-100">
                                                    <i class="fa fa-check fa-lg d-flex justify-content-center"></i>
                                                </button>
                                            </form>
                                        <?php } ?>

                                        <form class="formDelete bg-danger me-1" action="./taskController.php?action=deleteTask&id=<?= $task->id ?>" method="POST">
                                            <button class="bt bg-danger h-100 w-100">
                                                <i class="fa fa-trash fa-lg d-flex justify-content-center"></i>
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

</body>

</html>