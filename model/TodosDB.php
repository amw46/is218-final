<?php


class TodosDB {

    private function __construct() {}

    public static function getTodo($id) {

        $list = array();

        $db = Database::getDB();

        $query = 'SELECT * FROM todos WHERE ownerid = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
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