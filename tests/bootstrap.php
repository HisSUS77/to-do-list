<?php

// Mock database class for testing
if (!class_exists('dataBase')) {
    class dataBase {
        private $connection;
        
        public function __construct() {
            // Mock connection - no real DB needed for unit tests
            $this->connection = null;
        }
        
        public function getConnection() {
            return $this->connection;
        }
    }
}

// Load taskManager (which includes AbstructTaskManager)
require_once __DIR__ . '/../taskManager.class.php';

// Create class alias for case-insensitive access
if (!class_exists('TaskManager')) {
    class_alias('taskManager', 'TaskManager');
}
