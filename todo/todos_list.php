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
                <span><a href="?action=show_edit_form&id=<?php echo $tdi->getId(); ?>"><i class="fa fa-pencil"></i></a></span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p><a href="?action=show_add_form"><i class="fa fa-plus"></i></a></p>

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
                <span><a href="?action=show_edit_form&id=<?php echo $tdc->getId(); ?>"><i class="fa fa-pencil"></a></span>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action"
                            value="delete_todo">
                    <input type="hidden" name="itemid" value="<?php echo $tdc->getId(); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
</body>


</html>



<?php include '../view/footer.php'; ?>
