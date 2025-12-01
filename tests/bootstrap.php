<?php

// Mock database class for testing
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

// Mock abstract class
abstract class AbstructTaskManager {
    abstract public function addTask(string $task);
    abstract public function getAllTasks();
}

// Load taskManager after mocks
require_once __DIR__ . '/../taskManager.class.php';

// Create class alias for case-insensitive access
if (!class_exists('TaskManager')) {
    class_alias('taskManager', 'TaskManager');
}
