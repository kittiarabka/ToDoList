<?php 

    function task_create($title){
        $task =R::dispense('tasks');
		$task->title = $title;
		$id = R::store($task);
		
    }

?>