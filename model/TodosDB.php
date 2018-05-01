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

        return $e;
    }

    public static function addTodo ($mess, $cd, $dd) {

    }

    public static function editTodo($mess, $cd, $dd) {

    }

} //end class
?>