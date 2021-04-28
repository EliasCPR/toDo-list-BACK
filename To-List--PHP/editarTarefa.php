<?php

require("./database/conexao.php");

    //receber o id tarefa a ser editada
    $tarefaId = $_GET["tarefaId"];
    //select no banco da tarefa a ser editada
    //SELECT * FROM tbl_task WHERE id = $tarefaId;
    $sqlEdit = "SELECT * FROM task_list WHERE id = $tarefaId";
    //executar a consulta (mysql_query)
    $resultado = mysqli_query($conexao, $sqlEdit);
    //extrair a linha da consulta (mysql_fetch_array)
    $tarefa = mysqli_fetch_array($resultado);
    
    if(!$tarefa){
        die("Impossível editar, tarefa não encontrada.");
    }
    //colocar dentro do value do input a descrição da tarefa retornada do banco de dados
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="styles-global.css" />
</head>

<body>

    <div class="content">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="taskActions.php">
            <input type="hidden" name="acao" value="editar"/>
            <input type="hidden" name="tarefaId" value="<?= $tarefa["id"]?>" />
            <div class="input-group">
                <label for="tarefa">Descrição da tarefa</label>
                <input type="text" value="<?= $tarefa["descricao"] ?>" name="tarefa" id="tarefa" placeholder="Digite a tarefa" required />
            </div>
            <button>Editar</button>
        </form>
    </div>
</body>

</html>