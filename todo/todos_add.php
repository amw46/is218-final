<?php include '../view/header.php'; ?>


<div class="galaxy">
    <main class="text-center opac">
        <h1>Add A To-Do Item</h1>

        <form action="index.php" method="post" id="todo_add_form">

            <input type="hidden" name="action" value="add_todo">


            <br>
            <label>Message:</label>
            <input type="text" name="message" class="my-2">
            <br>
            <label>Created Date:</label>
            <input type="date" name="created" class="my-2">
            <br>
            <label>Due Date</label>
            <input type="date" name="due" class="my-2">
            <br>

            <input type="submit" value="Submit" class="my-2">
        </form>

        <p class="my-2"><a href="?action=list_todo">Back</a></p>

    </main>
</div>

<?php include '../view/footer.php'; ?>