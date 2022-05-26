-- Criação da Tabela Status
CREATE TABLE tb_status (
    id int PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(15) NOT NULL
);

-- Apenas para testar... Inserção na tabela tb_status
INSERT INTO tb_status (status) values ('pendente');
INSERT INTO tb_status (status) values ('realizado');

-- Criação da Tabela Tarefas
CREATE TABLE tb_tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    task TEXT NOT NULL,
    id_status INT NOT NULL DEFAULT 1,
    date_register DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    	FOREIGN KEY(id_status) REFERENCES tb_status(id)
);

-- Apenas para testar... Inserção na tabela tb_tasks
INSERT INTO tb_tasks(task) values ('Wash the dishes');
INSERT INTO tb_tasks(task) values ('to bake a cake');
INSERT INTO tb_tasks(task) values ('take the trash');