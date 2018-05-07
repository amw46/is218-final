<?php include '../view/header.php'; ?>

    <main>
        <h1>Edit A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_form">


            <?php
            $id = filter_input(INPUT_GET, 'id');
            ?>
            <input type="hidden" name="action" value="edit_todo">
            <input type="hidden" name="itemid" value="<?php echo $id; ?>">

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

        <p><a href="?action=todo_list">Back</a></p>

    </main>
<?php include '../view/footer.php'; ?>