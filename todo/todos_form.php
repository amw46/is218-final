<?php include '../view/header.php'; ?>
<?php
    include("../model/TodosDB.php");

?>


<main>
    <h1>Add Or Edit A To-Do Item</h1>

    <form action="index.php" method="post" id="todo_form">
        <div>
            <input type="radio" name="option" value="edit"><label>Edit</label><br>
            <input type="radio" name="option" value="add"><label>Add</label>
        </div>


        <?php $act = filter_input(INPUT_POST, "option"); ?>
            <?php if ($act == "edit") { ?>
                <input type="hidden" name="action" value="edit_todo">
            <?php }
                else { ?>
                <input type="hidden" name="action" value="add_todo">
           <?php  }?>



        <label>Message:</label>
        <input type="text">

        <label>Created Date:</label>
        <input type="date">

        <label>Due Date</label>
        <input type="date">
    </form>



</main>
<?php include '../view/footer.php'; ?>