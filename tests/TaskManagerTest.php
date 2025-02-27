<?php

namespace Daniel\TestG2;

use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase
{
    public function testAddTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("tache 1");
        $this->assertEquals("tache 1", $taskManager->getTask(0));
    }

    public function testRemoveTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("tache 1");
        $this->assertEquals(1, count($taskManager->getTasks()));
        $taskManager->removeTask(0);
        $this->assertEquals(0, count($taskManager->getTasks()));
        
    }


    public function testGetTasks()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("tache 1");
        $taskManager->addTask("tache 2");
        $taskManager->addTask("tache 3");
        $expected = ["tache 1", "tache 2", "tache 3"];
        $this->assertEquals($expected, $taskManager->getTasks());
    }


    public function testGetTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("tache 1");
        $taskManager->addTask("tache 2");
        $taskManager->addTask("tache 3");
        $expected = "tache 2";
        $this->assertEquals($expected, $taskManager->getTask(1));
    }

    public function testRemoveInvalidIndexThrowsException() 
    {
        $taskManager = new TaskManager();
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage("Index de tâche invalide: 0");
        $taskManager->removeTask(0);
    }

    public function testGetInvalidIndexThrowsException()
    {
        $taskManager = new TaskManager();
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage("Index de tâche invalide: 0");
        $taskManager->getTask(0);
    }

    public function testTaskOrderAfterRemoval() {
        $taskManager = new TaskManager();
        $taskManager->addTask("tache 1");
        $taskManager->addTask("tache 3");
        $expected = ["tache 1", "tache 3"];
        $this->assertEquals($expected, $taskManager->getTasks());
    }
}