<?php include '../view/header.php'; ?>
<?php
    include("../model/TodosDB.php");

    $desc = TodosDB::getDescription($email);
?>


<main>
    <h1>Add Or Edit A To-Do Item</h1>

    <form action="index.php" method="post" id="todo_form">
        <input type="checkbox" name="option" value="edit"><br>
        <input type="checkbox" name="option" value="add">

        <?php $act = filter_input(INPUT_POST, "option"); ?>
            <?php if ($act == "edit") { ?>
                <input type="hidden" name="action" value="edit_todo">
            <?php }
                else { ?>
                <input type="hidden" name="action" value="add_todo">
           <?php  }?>



        <label>Message:</label>
        <input type="text" value="<?php echo $desc;?>">

        <label>Created Date:</label>
        <input type="date">

        <label>Due Date</label>
        <input type="date">
    </form>



</main>
<?php include '../view/footer.php'; ?>