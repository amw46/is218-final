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

}

?>