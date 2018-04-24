<?php

require('../model/TodosDB.php');
require('../model/Todo.php');
require('../model/Database.php');

$first = filter_input();

$inDatabase;


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todo';
    }
}

?>