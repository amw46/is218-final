<?php include '../view/header.php'; ?>

    <main>
        <h1>Edit A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_form">

            <input type="hidden" name="action" value="edit_todo">


            <br>
            <label>Message:</label>
            <input type="text" name="message" value="<?php echo $m; ?>">
            <br>
            <label>Created Date:</label>
            <input type="date" name="created" value="<?php echo $c; ?>">
            <br>
            <label>Due Date:</label>
            <input type="date" name="due" value="<?php echo $d; ?>">
            <br>

            <input type="submit" value="Submit">
        </form>

        <a href="todos_list.php">Back</a>

    </main>
<?php include '../view/footer.php'; ?>