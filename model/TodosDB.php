<?php

class TodosDB {

    private function __construct() {}

    public static function getCompleteTodo($em) {

        $list = array();

        $db = Database::getDB();

        $query = 'SELECT * FROM todos WHERE owneremail = :email AND isdone = :bool';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $em);
        $statement->bindValue(':bool', 0);
        $statement->execute();
        $todos = $statement->fetchAll();
        $statement->closeCursor();

        foreach($todos as $todo) {

            $user = new Todo($todo['id'], $todo['message'], $todo['createddate'], $todo['duedate'], $todo['isdone']);

            $list[] = $user;
         }


        return $list;

    }

    public static function getIncompleteTodo($em) {

        $list = array();

        $db = Database::getDB();

        $query = 'SELECT * FROM todos WHERE owneremail = :email AND isdone = :bool';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $em);
        $statement->bindValue(':bool', 1);
        $statement->execute();
        $todos = $statement->fetchAll();
        $statement->closeCursor();

        foreach($todos as $todo) {

            $user = new Todo($todo['id'], $todo['message'], $todo['createddate'], $todo['duedate'], $todo['isdone']);

            $list[] = $user;
        }


        return $list;

    }


    public static function addTodo ($oid, $em, $mess, $cd, $dd, $done) {
        $db = Database::getDB();

        $query = 'INSERT INTO (id, email, ownerid, createddate, duedate, message, isdone) VALUES (, :em, :oid, :cd, :dd, :mess, :done)';

        $statement = $db->prepare($query);
        $statement->bindValue(":mess", $mess);
        $statement->bindValue(":cd", $cd);
        $statement->bindValue(":dd", $dd);
        $statement->bindValue(":em", $em);
        $statement->bindValue(":oid", $oid);
        $statement->bindValue(":done", $done);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function editTodo($oid, $em, $mess, $cd, $dd) {
        $db = Database::getDB();

        $query = 'UPDATE todos SET message = :mess, createddate = :cd, duedate = :dd WHERE owneremail = :em AND ownerid = :oid';
        $statement = $db->prepare($query);
        $statement->bindValue(":mess", $mess);
        $statement->bindValue(":cd", $cd);
        $statement->bindValue(":dd", $dd);
        $statement->bindValue(":em", $em);
        $statement->bindValue(":oid", $oid);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getTodoById($id) {

        $db = Database::getDB();

        $query = 'SELECT message, createddate, duedate FROM todos WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $todos = $statement->fetchAll();
        $statement->closeCursor();

        return $todos;
    }

    public static function deleteTodo($id) {
        $db = Database::getDB();

        $query = 'DELETE FROM todos WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function setComplete() {

    }

} //end class
?>