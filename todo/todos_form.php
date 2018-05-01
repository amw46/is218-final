<?php include '../view/header.php'; ?>
<?php
    include("../model/Todo.php");

    $desc = TodosDB::getDescription($em);
?>


<main>
    <h1>Add Or Edit A To-Do Item</h1>

    <form action="index.php" method="post" id="todo_form">
        <input type="checkbox" name="option" value="edit"><br>
        <input type="checkbox" name="option" value="add">

        <?php $act = filter_input(INPUT_POST, "option");
            if ($act == "edit") {
                $action = "edit_todo";
            }
            else {
                $action = "add_todo";
            }
        ?>

        <input type="hidden" name="action" value="<?php echo $action;?>">
        <label>Message:</label>
        <input type="text" value="<?php echo $desc;?>">

        <label>Created Date:</label>
        <input type="date">

        <label>Due Date</label>
        <input type="date">
    </form>



</main>
<?php include '../view/footer.php'; ?>