<?php

require('../model/TodosDB.php');
require('../model/AccountDB.php');
require('../model/Todo.php');
require('../model/Database.php');

//$cookieName = 'cookieid';
//setcookie($cookieName, $id, time() + (86400 * 30), "/"); // 86400 = 1 day

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'auth';
    }
}

if ($action == "auth") {
    $email = filter_input(INPUT_POST, 'signInEmail');
    $pass = filter_input(INPUT_POST, 'signInPassword');
    $name = AccountDB::getNameByEmail($email);
    $id = AccountDB::getIDByEmail($email);

    $inDatabase = AccountDB::authorize($email, $pass);
    $_SESSION['auth'] = $inDatabase;

    $_SESSION['user_email'] = $email;
    $_SESSION['user_pass'] = $pass;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_id'] = $id;
    $_SESSION['incomplete'] = TodosDB::getIncompleteTodo($email);
    $_SESSION['complete'] = TodosDB::getCompleteTodo($email);

    header('Location: .?action=list_todo');
}

else if ($action == "new_user") {
    $first = filter_input(INPUT_POST, 'firstname');
    $last = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');
    $birthday = filter_input(INPUT_POST, 'bday');
    $gender = filter_input(INPUT_POST, 'gender');

    AccountDB::addAccount($email, $first, $last, $phone, $birthday, $gender, $password);

    header('Location: .?action=list_todo');
   // echo "Account created successfully";
}


if ((!empty($_SESSION['auth']) || $_SESSION['auth'] == 'true')) {




    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_todo';
        }
    }

    if ($action == 'list_todo') {
        $name = $_SESSION['user_name'];
        $todosInc = $_SESSION['incomplete'];
        $todosCom = $_SESSION['complete'];

        include('todos_list.php');
    }


    else if ($action == "show_add_form") {
        include('todos_add.php');
    }

    else if ($action == "show_edit_form") {
        include('todos_edit.php');
    }

    else if ($action == "edit_todo") {
        $tid = filter_input(INPUT_POST, "itemid");
        $todo = TodosDB::getTodoById($tid);
        //pasing variables along


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
            $todo->setDescription($message);
            $todo->setCreateDate($created);
            $todo->setDueDate($due);
            TodosDB::editTodo($_SESSION['user_id'], $_SESSION['user_email'], $todo->getDescription(), $todo->getCreateDate(), $todo->getDueDate());

            header('Location: .?action=list_todo');
        }


    }
    else if ($action == "add_todo") {
        $message = filter_input(INPUT_POST, "message");
        $created = filter_input(INPUT_POST, "created");
        $due = filter_input(INPUT_POST, "due");

        if ($message == NULL || $message == FALSE ||$due == NULL || $created == NULL) {
            echo 'Invalid';
            echo '<br>';
            echo '<a href=".?action=list_todo">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::addTodo($_SESSION['user_id'], $_SESSION['user_email'], $message, $created, $due, 0);
            header('Location: .?action=list_todo');
        }
    }
    else if ($action == "delete_todo") {
        $tid = filter_input(INPUT_POST, "itemid");
        $todo = TodosDB::getTodoById($tid);

        if ($tid == NULL || $tid == "") {
            echo 'Invalid';
            echo '<br>';
            echo '<a href=".?action=list_todo">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::deleteTodo($tid);
            header('Location: .?action=list_todo');
        }
    }

    else if ($action == "set_complete") {
        $tid = filter_input(INPUT_POST, "itemid");
        $todo = TodosDB::getTodoById($tid);

        if ($tid == NULL || $tid == "") {
            echo 'Invalid';
            echo '<br>';
            echo '<a href=".?action=list_todo">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::setComplete($tid);
            header('Location: .?action=list_todo');
        }
    }

    else if ($action == "set_incomplete") {
        $tid = filter_input(INPUT_POST, "itemid");
        $todo = TodosDB::getTodoById($tid);

        if ($tid == NULL || $tid == "") {
            echo 'Invalid';
            echo '<br>';
            echo '<a href=".?action=list_todo">Refresh';
            echo '</a>';
        }
        else {
            TodosDB::setIncomplete($tid);
            header('Location: .?action=list_todo');
        }

    }

}

else {
    echo 'Not found in database';
    echo '<br>';
    echo '<a href="../index.html">Refresh';
    echo '</a>';

}

?>