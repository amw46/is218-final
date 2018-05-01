<?php include '../view/header.php'; ?>
<?php
    include("../model/TodosDB.php");

?>


<main>
    <h1>Add Or Edit A To-Do Item</h1>

    <form action="index.php" method="post" id="todo_form">
        <div>
            <input type="radio" name="option" value="edit"><label>Edit</label>
            <input type="radio" name="option" value="add"><label>Add</label>
        </div>


        <?php $act = filter_input(INPUT_POST, "option"); ?>
            <?php if ($act == "edit") { ?>
                <input type="hidden" name="action" value="edit_todo">
            <?php }
                else { ?>
                <input type="hidden" name="action" value="add_todo">
           <?php  }?>


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



</main>
<?php include '../view/footer.php'; ?>