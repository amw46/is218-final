<?php include '../view/header.php'; ?>

<div class="galaxy">
    <main class="text-center opac">
        <h1>Edit A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_form">


            <?php
            $id = filter_input(INPUT_GET, 'id');
            $todo = TodosDB::getTodoById($id);
            ?>
            <input type="hidden" name="action" value="edit_todo">
            <input type="hidden" name="itemid" value="<?php echo $id; ?>">

            <br>
            <label>Message:</label>
            <input type="text" name="message" value="<?php echo $todo->getDescription(); ?>">
            <br>
            <label>Created Date:</label>
            <input type="date" name="created" value="<?php echo $todo->getCreateDate(); ?>">
            <br>
            <label>Due Date:</label>
            <input type="date" name="due" value="<?php echo $todo->getDueDate(); ?>">
            <br>

            <input type="submit" value="Submit">
        </form>

        <p><a href="?action=list_todo">Back</a></p>

    </main>
</div>

<?php include '../view/footer.php'; ?>