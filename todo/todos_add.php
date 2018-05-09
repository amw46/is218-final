<?php include '../view/header.php'; ?>
<?php
include("../model/TodosDB.php");

?>

<div class="galaxy">
    <main class="text-center opac">
        <h1>Add A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_add_form">

            <input type="hidden" name="action" value="add_todo">


            <br>
            <label>Message:</label>
            <input type="text" name="message">
            <br>
            <label>Created Date:</label>
            <input type="date" name="created">
            <br>
            <label>Due Date</label>
            <input type="date" name="due">
            <br>

            <input type="submit" value="Submit">
        </form>

        <p><a href="?action=todo_list">Back</a></p>

    </main>
</div>

<?php include '../view/footer.php'; ?>