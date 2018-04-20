<?php


class TodosDB {

    private function __construct() {}

    public static function getTodo($id) {

        $users = array();

        $db = Database::getDB();

        $query = 'SELECT * FROM todos WHERE ownerid = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $accts = $statement->fetchAll();
        $statement->closeCursor();

        /*
        foreach($accts as $acct) {

            $user = new Users($acct['id'], $acct['email'], $acct['fname'], $acct['lname'], $acct['phone'], $acct['birthday'], $acct['gender'], $acct['password']);

            $users[] = $user;
         }
        */

        return $users;

    }

} //end class
?>