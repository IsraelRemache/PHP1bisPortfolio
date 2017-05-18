<h1>Add a todo item</h1>
<form action="" method="post">
	<label for="todo">Todo item</label>
	<input type="text" name="todo" id="todo">
	<button type="submit">Save todo item</button>
</form>
<p class="error"></p>

<ul>
	<?php foreach($todos->result() as $todo): ?>
	<li><?php echo $todo->todo; ?></li>
	<?php endforeach; ?>
</ul>