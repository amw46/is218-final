<?php include '../view/header.php'; ?>
<?php
include("../model/TodosDB.php");

?>


    <main>
        <h1>Ediot A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_form">

            <input type="hidden" name="action" value="add_todo">


            <br>
            <label>Message:</label>
            <input type="text" name="message" value="<?php echo $message; ?>">
            <br>
            <label>Created Date:</label>
            <input type="date" name="created" value="<?php echo $created; ?>">
            <br>
            <label>Due Date</label>
            <input type="date" name="due" value="<?php echo $due?>">
            <br>

            <input type="submit" value="Submit">
        </form>



    </main>
<?php include '../view/footer.php'; ?>