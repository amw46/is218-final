<?php

require('../model/TodosDB.php');
require('../model/AccountDB.php');
require('../model/Todo.php');
require('../model/Database.php');

$cookieName = 'cookieName';
$email = filter_input(INPUT_POST, 'signInEmail');
$pass = filter_input(INPUT_POST, 'signInPassword');
$name = AccountDB::getNameByEmail($email);
$id = AccountDB::getIDByEmail($email);

session_start();

setcookie($cookieName, $name, time() + (86400 * 30), "/"); // 86400 = 1 day

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
        $name = AccountDB::getNameByEmail($email);
        $todosInc = TodosDB::getIncompleteTodo($email);
        $todosCom = TodosDB::getCompleteTodo($email);

        include('todos_list.php');
    }
    else if ($action == "show_form") {
        include('todos_form.php');
    }

    else if ($action == "edit_todo") {

    }
    else if ($action == "add_todo") {

    }
    else if ($action == "delete_todo") {

    }

}

else {
    echo 'Not found in database';
    echo '<br>';
    echo '<a href="../index.html">Refresh';
    echo '</a>';

}

?>