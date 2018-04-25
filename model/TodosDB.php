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

} //end class
?>