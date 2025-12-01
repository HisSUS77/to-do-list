<?php

use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase
{
    private $taskManager;
    
    protected function setUp(): void
    {
        $this->taskManager = new TaskManager();
    }
    
    public function testAddTask()
    {
        $this->taskManager->addTask("Test Task");
        $this->assertEquals("Test Task", $this->taskManager->getProduct());
    }
    
    public function testSetId()
    {
        $this->taskManager->setId(5);
        $this->assertEquals(5, $this->taskManager->getId());
    }
    
    public function testSetProduct()
    {
        $this->taskManager->setProduct("Task");
        $this->assertEquals("Task", $this->taskManager->getProduct());
    }
}
