<?php

class Database {

    private static $dbName = 'joshtfhl_mailing' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'joshtfhl_mailer';
    private static $dbUserPassword = ']6yePd7G=O9$';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect() {
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}

?>