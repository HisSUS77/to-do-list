<?php
class dataBase extends PDO {
    public function __construct() {
        $db_host_file = '/run/secrets/db_host';
        $db_user_file = '/run/secrets/db_user';
        $db_pass_file = '/run/secrets/db_password';
        $db_name_file = '/run/secrets/db_name';

        if (file_exists($db_host_file)) {
            $host = trim(file_get_contents($db_host_file));
            $user = trim(file_get_contents($db_user_file));
            $pass = trim(file_get_contents($db_pass_file));
            $name = trim(file_get_contents($db_name_file));
        } else {
            $host = 'db';
            $user = 'root';
            $pass = 'rootpass';
            $name = 'todo';
        }

        try {
            parent::__construct("mysql:host=$host;dbname=$name", $user, $pass);
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
        }
    }
}
?>
