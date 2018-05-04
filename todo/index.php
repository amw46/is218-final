<?php

require('../model/TodosDB.php');
require('../model/AccountDB.php');
require('../model/Todo.php');
require('../model/Database.php');

$cookieName = 'cookieid';
$email = filter_input(INPUT_POST, 'signInEmail');
$pass = filter_input(INPUT_POST, 'signInPassword');
$name = AccountDB::getNameByEmail($email);
$id = AccountDB::getIDByEmail($email);


session_start();
$_SESSION['user_email'] = $email;
$_SESSION['user_pass'] = $pass;
//setcookie($cookieName, $id, time() + (86400 * 30), "/"); // 86400 = 1 day

$inDatabase = AccountDB::authorize($_SESSION['user_email'], $_SESSION['user_pass']);

if ($inDatabase) {


    $_SESSION['user_name'] = $name;

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_todo';
        }
    }

    if ($action == 'list_todo') {
        $name = $_SESSION['user_name'];
        $todosInc = TodosDB::getIncompleteTodo($email);
        $todosCom = TodosDB::getCompleteTodo($email);

        include('todos_list.php');
    }
    else if ($action == "show_add_form") {
        include('todos_add.php');
    }

    else if ($action == "edit_todo") {

        if ($message == NULL || $message == FALSE ||$due == NULL || $created == NULL) {
            echo 'Invalid';
            echo '<br>';
            echo '<a href="todos_list.php">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::editTodo($id, $email, $message, $created, $due);
        }

    }
    else if ($action == "add_todo") {
        $message = filter_input(INPUT_POST, "message");
        $created = filter_input(INPUT_POST, "created");
        $due = filter_input(INPUT_POST, "due");

        if ($message == NULL || $message == FALSE ||$due == NULL || $created == NULL) {
            echo 'Invalid';
            echo '<br>';
            echo '<a href="todos_list.php">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::addTodo($id, $email, $message, $created, $due);
        }
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