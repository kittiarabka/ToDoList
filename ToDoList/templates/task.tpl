<?php 

	$doneClass = 'todo-item-text';

	if($task['status'] === 'ready') {
		$doneClass .= ' done';
	}
?>



<li class="list-group-item d-flex justify-content-between">
			<span class="<?php echo $doneClass; ?>"><?php echo $task['title']; ?></span>
			<form class="btn-group" method="GET">
				<?php if($task['status'] === 'ready'): ?>
					<button name="action" value="changeStatus" class="btn btn-outline-dark btn-sm">В работу</button>
				<?php else: ?>
					<button name="action" value="changeStatus" class="btn btn-outline-success btn-sm">Готово</button>
				<?php endif; ?>
				<input type="hidden" name="id" value="<?= $task['id']?>">
				<button name="action" value="delete" class="btn btn-outline-danger btn-sm">Удалить</button>
			</form>
</li>