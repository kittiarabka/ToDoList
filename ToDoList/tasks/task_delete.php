<?php 
    function task_delete($id){
        $task = R::load('tasks', $id); //загрузка задачи по id
		R::trash($task); //удаление записи
    }
?>