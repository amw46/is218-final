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
    </tr>
        <?php foreach ($todosCom as $tdc) : ?>
            <?php echo $tdc->printRow(); ?>
        <?php endforeach; ?>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show_form">
                <button type="button" style="border-radius: 50%"><i class="fa fa-pencil"></i></button>
            </form>
        </td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show_form">
                <button type="button"><i class="fa fa-plus"></i></button>
            </form>
        </td>

    <?php echo '</tr>';?>
</table>

</body>


</html>



<?php include '../view/footer.php'; ?>
