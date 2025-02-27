<?php

namespace Daniel\TestG2;

use PHPUnit\Framework\TestCase;

class UserManagerTest extends TestCase{
    public function testAddUser()
    {
        $userManager = new UserManager();
        $userManager->addUser("Daniel", "test@test.com");
        $expected = array(array("name"=>"Daniel", "email"=>"test@test.com"));
        $actual = $userManager->getUsers();
        unset($actual[0]['id']);
        $this->assertEquals($expected, $actual);
    }
    public function testAddUserEmailException() {
        $userManager = new UserManager();
        $userManager->addUser("Daniel", "test@test.com");
        $this->expectException(\PDOException::class);
        $this->expectExceptionMessage("SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'test@test.com' for key 'email'");
        $userManager->addUser("Daniel", "test@test.com");
    }

    public function testUpdateUser()
    {
        $userManager = new UserManager();
        $userManager->addUser("Daniel", "test@test.com");
        $users = $userManager->getUsers();
        // get id of user
        $id = 0;
        $element = 0;
        for ($i=0; $i<count($users); $i++){
            if($users[$i]["email"] === "test@test.com"){
                $id = $users[$i]["id"];
                $element = $i;
                break;
            }
        }
        $userManager->updateUser($id,"dani", "test@tes.com");
        $users = $userManager->getUsers();
        $this->assertEquals("dani", $users[$element]["name"]);
        $this->assertEquals("test@tes.com", $users[$element]["email"]);
    }

    public function testRemoveUser() {
        $userManager = new UserManager();
        $userManager->addUser("Daniel", "test@test.com");
        $userManager->removeUser(1);
        $this->assertEquals([], $userManager->getUsers()); 
    }

    public function testGetUsers()
    {
        $userManager = new UserManager();
        $userManager->addUser("Daniel", "test@test.com");
        $expected = array(array('name' => "Daniel", "email" => "test@test.com", "id"=>1));
        $this->assertEquals($expected, $userManager->getUsers()); 
    }
    public function testInvalidUpdateThrowsException()
    {
        $userManager = new UserManager();
        $this->expectException(\PDOException::class);
        $userManager->updateUser(999, "test", "t@t.com");
        
    }
    public function testInvalidDeleteThrowsException()
    {
        $userManager = new UserManager();
        $this->expectException(\PDOException::class);
        $userManager->removeUser(999);
        
    }
}