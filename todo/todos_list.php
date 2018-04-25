<?php include '../view/header.php'; ?>

<?php

$em = filter_input(INPUT_COOKIE, 'cookieEm', FILTER_VALIDATE_INT);
$name = AccountDB::getNameByEmail($em);
$todosInc = TodosDB::getIncompleteTodo($em);
$todosCom = TodosDB::getCompleteTodo($em);

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
    <tr>
        <?php foreach ($todosInc as $tdi) : ?>
            <?php echo $tdi->printRow(); ?>
        <?php endforeach; ?>
    </tr>
</table>


<h2>Complete To-Do List</h2>
<table>
    <tr>
        <th>Description</th>
        <th>Created Date</th>
        <th>Due Date</th>
    </tr>
    <tr>
        <?php foreach ($todosCom as $tdc) : ?>
            <?php echo $tdc->printRow(); ?>
        <?php endforeach; ?>
    </tr>
</table>

</body>


</html>



<?php include '../view/footer.php'; ?>
