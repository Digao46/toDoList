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

    <?php if (isset($_GET['included']) && $_GET['included'] == 1) : ?>
        <div class="pt-2 text-white d-flex justify-content-center confirmation">
            <h5>
                Tarefa Inserida com Sucesso!
            </h5>
        </div>
    <?php endif; ?>


    <div class="container app">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 menu">
                <ul>
                    <li class="list-group-item "><a href="./index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item active"><a href="#">Nova Tarefa</a></li>
                    <li class="list-group-item "><a href="allTasks.php">Todas as Tarefas</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-8 col-lg-9">
                <div class="container page">
                    <div class="row">
                        <div class="col">
                            <h4>Nova Tarefa</h4>
                            <hr>
                            <div class="row">
                                <form action="./taskController.php?action=insert" method="POST">
                                    <div class="form-group ">
                                        <label> Tarefa: </label>
                                        <input class="form-control" type="text" name="task" placeholder="Exemplo: Comprar pão" required>
                                    </div>

                                    <button class="btn btn-outline-dark">Adicionar</button>
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