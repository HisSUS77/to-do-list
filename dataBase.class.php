<?php
class dataBase extends PDO {

    private $_DB_HOST;
    private $_DB_USER;
    private $_DB_PASS;
    private $_DB_NAME;

    public function __construct() {
        $this->_DB_HOST = getenv('DB_HOST') ?: 'db';
        $this->_DB_USER = getenv('DB_USER') ?: 'appuser';
        $this->_DB_PASS = getenv('DB_PASS') ?: 'appuserpass';
        $this->_DB_NAME = getenv('DB_NAME') ?: 'todo_list';

        try {
            parent::__construct("mysql:host=$this->_DB_HOST;dbname=$this->_DB_NAME", $this->_DB_USER, $this->_DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
        }
    }
}
?>
