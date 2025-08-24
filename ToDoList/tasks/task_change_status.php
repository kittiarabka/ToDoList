<?php
    function change_status($id) {
        $task = R::load('tasks', $id); //загрузка задачи по id
		
		if($task->status === 'ready') {
			$task->status = NULL;
		} else {
			$task->status = 'ready';
		}

		R::store($task); //сохраняем задачу
    }