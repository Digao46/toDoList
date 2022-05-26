<?php
    // CRUD - Create, Read, Update, Delete
    class TaskServices {
        private $connection;
        private $task;

        // CONSTRUTOR:
        public function __construct(Connection $connection, Task $task) {
            $this->connection = $connection->connect();
            $this->task = $task;
        }

        // INSERÇÃO DE TAREFAS
        public function insert() {
            $query = 'INSERT INTO tb_tasks(task) VALUES (:task)';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':task', $this->task->__get('task'));
            $stmt->execute();
        }

        // LISTAGEM DE TAREFAS
        public function getTasks() {
            $query = 'SELECT t.id, t.task, t.date_register, s.status 
                            FROM tb_tasks as t 
                      LEFT JOIN tb_status as s on (t.id_status = s.id);';

            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // LISTAGEM DE TAREFAS PENDENTES
        public function getUndoneTasks() {
            $query = 'SELECT t.id, t.task, t.date_register, s.status 
                            FROM tb_tasks as t 
                      LEFT JOIN tb_status as s on (t.id_status = s.id) 
                            WHERE s.id = 1;';

            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
           
        }

        // EXCLUSÃO DE TAREFAS
        public function delete($id) { 
            $query = ("DELETE FROM tb_tasks WHERE id = $id");
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
        }

        // MARCAR COMO CONCLUÍDA
        public function markAsDone($id) {
            $query = ("UPDATE tb_tasks SET id_status = 2 WHERE id = $id");
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
        }
    }
