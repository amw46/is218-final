<?php //include '../view/header.php'; ?>

<?php

//$name = filter_input(INPUT_COOKIE, 'cookieName');
//$em = $_COOKIE['cookieEm'];


?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> <!-- bootstrap css -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<main class="text-center">
    <h1>Welcome, <?php echo $name ?></h1>

    <div class="container-fluid">
        <div class="card border-0 mt-5 inc">
            <h2>Incomplete To-Do List</h2>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Due Date</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                </tr>
                <?php foreach ($todosInc as $tdi) : ?>
                    <tr>
                        <?php echo $tdi->printRow(); ?>
                        <td>
                            <span><a class="btn btn-primary" href="?action=show_edit_form&id=<?php echo $tdi->getId(); ?>"><i class="fa fa-pencil"></i></a></span>
                        </td>
                        <td>
                            <form action="." method="post">
                                <input type="hidden" name="action"
                                       value="delete_todo">
                                <input type="hidden" name="itemid" value="<?php echo $tdi->getId(); ?>">
                                <button class="btn btn-primary" type="submit" value="Delete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p><a class="btn-btn-primary" href="?action=show_add_form"><i class="fa fa-plus"></i></a></p>
        </div>


        <div class="card border-0 mt-4 comp">
            <h2>Complete To-Do List</h2>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Due Date</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($todosCom as $tdc) : ?>
                    <tr>
                        <?php echo $tdc->printRow(); ?>
                        <td>
                            <span><a class="btn btn-primary" href="?action=show_edit_form&id=<?php echo $tdc->getId(); ?>"><i class="fa fa-pencil"></i></a></span>
                        </td>
                        <td>
                            <form action="." method="post">
                                <input type="hidden" name="action"
                                       value="delete_todo">
                                <input type="hidden" name="itemid" value="<?php echo $tdc->getId(); ?>">
                                <button class="btn btn-primary" type="submit" value="Delete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>



    </div>
</main>



</body>


</html>



<?php // include '../view/footer.php'; ?>
