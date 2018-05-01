<?php include '../view/header.php'; ?>

<?php

$name = filter_input(INPUT_COOKIE, 'cookieName');
//$em = $_COOKIE['cookieEm'];


?>

<html>
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
</table>

</body>


</html>



<?php include '../view/footer.php'; ?>
