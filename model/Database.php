<?php


class Database
{

    private static $username = 'amw46';
    private static $password = 'FzLRiQH3';
    private static $dsn = 'mysql:host=sql2.njit.edu;dbname=amw46';
    private static $db;


    private function __construct() {}

    public static function getDB() {

        if (!isset(self::$db)) { //if database is not set
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                echo '<h2>Connected to the database successfully!</h2>';

            } catch (PDOException $error) {
                echo '<h3>Database Error</h3>';
                echo $error->getMessage().'<br>';
                exit(); //exit the program
            } catch (Exception $e) {
                echo '<h3>Generic Error</h3>';
                echo $e->getMessage().'<br>';
                exit();

            } //end try

        } //end if

        return self::$db; //return the database
    } //end getDB

    public function authorize($em, $pass) {
        $db = Database::getDB();
        $isInDatabase = false;

        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $em);
        $statement->bindValue(':password', $pass);
        $statement->execute();

        if ($statement->fetchAll()) { //a result is found
            $isInDatabase = true;
        }

        $statement->closeCursor();

        return $isInDatabase;
    }

    public function getNameByEmail($email){
        $db = Database::getDB();

        $query = 'SELECT fname, lname FROM accounts WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();

        $n = $statement->fetch();
        $statement->closeCursor();

        return $n;
    }

}

?>