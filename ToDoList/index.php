<?php 
	require_once('./config.php');
	require_once('./db.php');
	require_once(ROOT . 'tasks/task_create.php'); //ROOT чтобы правильно подключить файлы, находящиеся в определенных папках
	require_once(ROOT . 'tasks/task_delete.php');
	require_once(ROOT . 'tasks/task_change_status.php');
	require_once(ROOT . 'tasks/task_get_all.php');

//СОЗДАНИЕ ЗАДАЧИ
	if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
		task_create($_POST['title']);
	}

//УДАЛЕНИЕ ЗАДАЧИ

	if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
		task_delete($_GET['id']);
	}

//ИЗМЕНЕНИЕ СТАТУСА ЗАДАЧИ
	if(isset($_GET['action']) && $_GET['action'] === 'changeStatus' && isset($_GET['id']) && is_numeric($_GET['id'])) {
		change_status($_GET['id']);
	}


	//получение всех задач
	$tasks = task_get_all();

	//подсчет статистики 

	//всего задач
	$count_all = count($tasks); //count - подсчитывает количество элементов

	//подсчет выполненных задач
	$count_done = 0;
	foreach($tasks as $task) {
		if($task['status'] === 'ready') {
			$count_done++;
		}
	}

	//подсчет невыполненных задач
	$count_not_done = $count_all - $count_done;
?>


<!DOCTYPE html>
<html lang="ru">

<?php 
	include(ROOT .  'templates/page_parts/head.tpl')
?>
<body class="todo-app p-5">


<?php 
	include(ROOT .  'templates/page_parts/header.tpl');
?>

	<!-- List -->
	<ul class="list-group mb-3">

	<?php 

		if (empty($tasks)) {
			include(ROOT .  'templates/empty.tpl');
		} else {
			foreach ($tasks as $task) {
				include(ROOT .  'templates/task.tpl');
			}
		}

		
	?>
	
	</ul>

	<?php 
		include(ROOT .  'templates/page_parts/form.tpl');
	?>

</body>
</html>
