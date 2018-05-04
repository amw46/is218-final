<?php include '../view/header.php'; ?>

<?php

//$name = filter_input(INPUT_COOKIE, 'cookieName');
//$em = $_COOKIE['cookieEm'];


?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<h1>Welcome, <?php echo $name ?></h1>

<h2>Incomplete To-Do List</h2>
<table>
    <tr>
        <th>Description</th>
        <th>Created Date</th>
        <th>Due Date</th>
        <th>&nbsp;</th>

    </tr>
    <?php foreach ($todosInc as $tdi) : ?>
        <tr>
            <?php echo $tdi->printRow(); ?>
            <td>
                <form action="todos_edit.php" method="post">
                    <input type="hidden" name="itemid" value="<?php echo $tdi->getId(); ?>">
                    <input type="submit" value="edit">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<form action="todos_add.php">
    <input type="submit" value="Add A New Task">
</form>

<h2>Complete To-Do List</h2>
<table>
    <tr>
        <th>Description</th>
        <th>Created Date</th>
        <th>Due Date</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($todosCom as $tdc) : ?>
        <tr>
            <?php echo $tdc->printRow(); ?>
            <td>
                <form action="todos_edit.php" method="post">
                    <input type="hidden" name="itemid" value="<?php echo $tdc->getId(); ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
</body>


</html>



<?php include '../view/footer.php'; ?>
