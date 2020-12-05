<?php
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_SCHEMA_NAME", "cv04");

class Connection
{
    static private $instance;

    static function getConnectionInstance(): mysqli
    {
        if (self::$instance == NULL) {
            $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_SCHEMA_NAME);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            self::$instance = $conn;
        }
        return self::$instance;
    }
}