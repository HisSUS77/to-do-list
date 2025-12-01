<?php

// Mock PDO statement for testing
class MockPDOStatement {
    public function execute($params = []) {
        return true;
    }
    
    public function fetch($mode = null) {
        return ['Test Task'];
    }
    
    public function fetchAll($mode = null) {
        return [];
    }
    
    public function bindParam($parameter, &$variable, $data_type = null) {
        return true;
    }
}

// Mock database class for testing - extends PDO
if (!class_exists('dataBase')) {
    class dataBase {
        public function __construct() {
            // Mock constructor - don't call parent PDO constructor
        }
        
        // Mock PDO methods
        public function prepare($sql) {
            return new MockPDOStatement();
        }
        
        public function query($sql) {
            return new MockPDOStatement();
        }
        
        public function errorInfo() {
            return ['00000', null, null];
        }
    }
}

// Load taskManager (which includes AbstructTaskManager)
require_once __DIR__ . '/../taskManager.class.php';

// Create class alias for case-insensitive access
if (!class_exists('TaskManager')) {
    class_alias('taskManager', 'TaskManager');
}
