<?php

require('../model/TodosDB.php');
include('../model/AccountDB.php');
require('../model/Todo.php');
require('../model/Database.php');

$cookieName = 'cookieEm';
$email = filter_input(INPUT_POST, 'signInEmail');
$pass = filter_input(INPUT_POST, 'signInPassword');

setcookie($cookieName, $email, time() + (86400 * 30), "/"); // 86400 = 1 day

$inDatabase = AccountDB::authorize($email, $pass);

if ($inDatabase) {


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_todo';
        }
    }

    if ($action == 'list_todo') {
        include('todos_list.php');
    }

}

else {
    echo 'Not found in database';
    echo '<br>';
    echo '<a href="../index.html">Refresh';
    echo '</a>';

}

?>