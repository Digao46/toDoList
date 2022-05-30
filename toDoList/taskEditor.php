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

    <title>To Do List - New Tasks</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php">
                <img src="./assets/img/logo.png" alt="logo" class="logo">
                SuperToDo</a>
        </div>
    </nav>

    <div class="container app">
        <div class="row">
            <div class="col-xs-12 col-md-4 menu">
                <ul class="ps-2 pe-2">
                    <li class="list-group-item active"><a href="./index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item "><a href="newTasks.php">Nova Tarefa</a></li>
                    <li class="list-group-item "><a href="allTasks.php">Todas as Tarefas</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-8">
                <div class="container page">
                    <div class="row">
                        <div class="col">
                            <h4>Editar Tarefa</h4>
                            <hr>
                            <div class="row">
                                <?php 
                                $id = $_GET['id'];
                                ?>
                                <form action="./taskController.php?action=editTask&id=<?= $id ?>" method="POST">
                                    <div class="form-group ">
                                        <label> Novo nome: </label>
                                        <input class="form-control" type="text" name="taskName" required>
                                    </div>
                                    <button class="btn btn-outline-dark">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>