<?php

class AccountDB
{


    public static function authorize($em, $pass) {
        $db = Database::getDB();
        $isInDatabase = false;

        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $em);
        $statement->bindValue(':password', $pass);
        $statement->execute();

        if ($info = $statement->fetchAll()) { //a result is found
            $isInDatabase = true;
        }

        $statement->closeCursor();

        return $isInDatabase;
    }

    public static function getNameByEmail($email){
        $db = Database::getDB();

        $query = 'SELECT fname, lname FROM accounts WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();

        $n = $statement->fetch();
        $statement->closeCursor();

        $name = $n['fname'] . " " . $n['lname'];

        return $name;
    }


}