<?php

// CRUD - Create, Read, Update, Delete
class TaskServices
{
    private $connection;

    // CONSTRUTOR:
    public function __construct(Connection $connection)
    {
        $this->connection = $connection->connect();
    }

    // INSERÇÃO DE TAREFAS
    public function insert($task)
    {
        $query = 'INSERT INTO tb_tasks(task) VALUES (:task)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':task', $task->__get('task'));
        $stmt->execute();
    }

    // LISTAGEM DE TAREFAS
    public function getTasks()
    {
        $query = 'SELECT t.id, t.task, t.date_register, s.status 
                            FROM tb_tasks as t 
                      LEFT JOIN tb_status as s on (t.id_status = s.id);';

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // LISTAGEM DE TAREFAS PENDENTES
    public function getUndoneTasks($task)
    {
        $query = 'SELECT t.id, t.task, t.date_register, s.status 
                            FROM tb_tasks as t 
                      LEFT JOIN tb_status as s on (t.id_status = s.id) 
                            WHERE s.id = :id_status';

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id_status', $task->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // EXCLUSÃO DE TAREFAS
    public function delete($id)
    {
        $query = ("DELETE FROM tb_tasks WHERE id = $id");
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    // SELECIONAR TASK
    public function getTask($id)
    {
        $query = ("SELECT * FROM tb_tasks WHERE id = $id ");
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchObject(Task::class);
    }

    // MARCAR COMO CONCLUÍDA
    public function markAsDone($id)
    {
        $task = $this->getTask($id);
        if ($task->id_status == 1) {
            $query = ("UPDATE tb_tasks SET id_status = 2 WHERE id = $id");
        } else {
            $query = ("UPDATE tb_tasks SET id_status = 1 WHERE id = $id");
        };
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    // EDITAR NOME DA TASK
    public function editTask($id, $newName)
    {
        $query = ("UPDATE tb_tasks SET task = '$newName' WHERE id = $id");
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }
}
