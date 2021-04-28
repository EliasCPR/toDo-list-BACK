<?php

//importa a conexão com o banco de dados
require("./database/conexao.php");

switch ($_POST["acao"]) {

    case "inserir":
        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["tarefa"])) {
            $tarefa = $_POST["tarefa"];

            //declara o SQL de inserção
            $sqlInsert = " INSERT INTO task_list (descricao) VALUES ('$tarefa') ";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert);

            if($resultado){
                $mensagem = "Tarefa adicionada com sucesso!";
                $tipoMensagem = "sucesso"; 
            }else{
                $mensagem = "Erro ao adicionar tarefa!";
                $tipoMensagem = "erro"; 
            }
        }
        break;

    case "deletar":
        //verificar se veio o tarefaId
        if (isset($_POST["tarefaId"])) {
            $tarefaId = $_POST["tarefaId"];

            //declarar o sql de delete
            $sqlDelete = " DELETE FROM task_list WHERE id = $tarefaId ";

            //executar o sql
            $resultado = mysqli_query($conexao, $sqlDelete);

            if($resultado){
                $mensagem = "Tarefa excluída com sucesso!";
                $tipoMensagem = "sucesso"; 
            }else{
                $mensagem = "Erro ao excluir a tarefa!";
                $tipoMensagem = "erro"; 
            }
        }
        break;

    case "editar":

        if(isset($_POST["tarefa"]) && isset($_POST["tarefaId"])) {

            // pegar a tarefa e a tarefaId
            $tarefa = $_POST["tarefa"];
            $tarefaId = $_POST["tarefaId"];
            // declarar a query updade

            $sqlUpdate = " UPDATE task_list SET descricao = '$tarefa' WHERE id = $tarefaId";
            
            // executar a query
            $resultado = mysqli_query($conexao, $sqlUpdate);
            // verificar se deu certo
            if ($resultado) {
                // se não deu certo, mensagem de erro
                $mensagem = "Tarefa editada com sucesso!";
                $tipoMensagem = "sucesso"; 
                // se deu certo, mensagem de sucesso
                $mensagem = "Ops, erro ao editar a tarefa!";
                $tipoMensagem = "erro"; 
            }
        }
        break;

        default:
            die("Ops, ação inválida");
            break;
}


    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: index.php?mensagem=$mensagem&tipoMensagem=$tipoMensagem");