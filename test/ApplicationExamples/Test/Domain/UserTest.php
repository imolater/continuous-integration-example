<?php

namespace ApplicationExamples\Test\Domain;

require_once 'ApplicationExample\Domain\User.php';

use ApplicationExample\Domain\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    private $user;

    protected function setUp() {
        $this->user = new User('Bob', 'bob@exmaple.com', '12345');
    }

    public function testSetName() {
        $name = 'Mike';
        $this->user->setName($name);

        self::assertEquals($name, $this->user->getName());
    }

    public function testSetMail() {
        $mail = 'mike@exmaple.com';
        $this->user->setName($mail);

        self::assertEquals($mail, $this->user->getName());
    }

    public function testSetPass() {
        $pass = 'pass';
        $this->user->setName($pass);

        self::assertEquals($pass, $this->user->getName());
    }
}
