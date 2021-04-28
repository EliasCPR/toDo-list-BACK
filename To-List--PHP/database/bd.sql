create database painellistatarefas;

use painellistatarefas;

create table task_list(
	id int primary key auto_increment,
    descricao varchar(255) not null
);

select * from task_list;	

insert task_list (descricao) values ("Estudar JAVA");

insert task_list (descricao) values ("Ler Clean Code");

DELETE FROM task_list WHERE ID <> 0;
DELETE FROM task_list WHERE ID = 45;

UPDATE tbl_list SET descricao = "Estudar Javascript" WHERE id = 4;