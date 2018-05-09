<?php include '../view/header.php'; ?>

    <main class="text-center">
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

        <p><a href="?action=todo_list">Back</a></p>

    </main>
<?php include '../view/footer.php'; ?>