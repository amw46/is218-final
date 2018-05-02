<?php include '../view/header.php'; ?>

<?php

$name = filter_input(INPUT_COOKIE, 'cookieName');
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

    </tr>
        <?php foreach ($todosInc as $tdi) : ?>
            <?php echo $tdi->printRow(); ?>
        <?php endforeach; ?>
</table>


<h2>Complete To-Do List</h2>
<table>
    <tr>
        <th>Description</th>
        <th>Created Date</th>
        <th>Due Date</th>
        <th>&nbsp;</th>
    </tr>
        <?php foreach ($todosCom as $tdc) : ?>
            <?php echo $tdc->printRow(); ?>
            <td>
                <form action="todos_edit.php" method="post">
                    <input type="hidden" name="action" value="edit_todo">
                    <button type="submit"><i class="fa fa-pencil"></i></button>
                </form>
            </td>
            <?php echo '</tr>';?>
        <?php endforeach; ?>

</table>

</body>


</html>



<?php include '../view/footer.php'; ?>
