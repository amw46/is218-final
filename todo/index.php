<?php

require('../model/TodosDB.php');
include('../model/AccountDB.php');
require('../model/Todo.php');
require('../model/Database.php');


$email = filter_input(INPUT_POST, 'signInEmail');
$pass = filter_input(INPUT_POST, 'signInPassword');

$inDatabase = AccountDB::authorize($email, $pass);

if ($inDatabase) {


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_todo';
        }
    }

}

else {
    echo 'Not found in database';

    echo '<a href="index.php">Refresh';
    echo '</a>';

}

?>