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

            $user = new Todo($todo['message'], $todo['createddate'], $todo['duedate']);

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

            $user = new Todo($todo['message'], $todo['createddate'], $todo['duedate']);

            $list[] = $user;
        }


        return $list;

    }

    public static function getDescription($em) {

        $db = Database::getDB();

        $query = 'SELECT message FROM todos WHERE owneremail = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $em);
        $statement->execute();
        $e = $statement->fetch();

        $statement->closeCursor();

        $ea = $e['message'];

        return $ea;
    }

    public static function addTodo ($id, $em, $mess, $cd, $dd) {
        $db = Database::getDB();

        $query = 'INSERT INTO (id, email, ownerid, createddate, duedate, message, isdone) VALUES (, :em, :id, :cd, :dd, :mess, 0)';

        $statement = $db->prepare($query);
        $statement->bindValue(":mess", $mess);
        $statement->bindValue(":cd", $cd);
        $statement->bindValue(":dd", $dd);
        $statement->bindValue(":em", $em);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function editTodo($id, $em, $mess, $cd, $dd) {
        $db = Database::getDB();

        $query = 'UPDATE todos SET message = :mess, createddate = :cd, duedate = :dd WHERE owneremail = :em AND ownerid = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":mess", $mess);
        $statement->bindValue(":cd", $cd);
        $statement->bindValue(":dd", $dd);
        $statement->bindValue(":em", $em);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function setComplete() {

    }

} //end class
?>