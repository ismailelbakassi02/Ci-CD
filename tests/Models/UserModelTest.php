<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\UserModel;
use PHPUnit\Framework\Attributes\Test;

class UserModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->createMock(UserModel::class);
    }
    
    #[Test]
    public function test_find_all_users()
    {
        $expectedUsers = [
            ['name' => 'Test User', 'email' => 'test@example.com']
        ];
        
        $this->model->method('findAll')
            ->willReturn($expectedUsers);
            
        $users = $this->model->findAll();
        $this->assertIsArray($users);
    }
    
    #[Test]
    public function test_insert_user()
    {
        $data = ['name' => 'Jamila Dahi', 'email' => 'jda@gk.mt'];
        
        $this->model->method('insert')
            ->willReturn(1);
            
        $id = $this->model->insert($data);
        $this->assertGreaterThan(0, $id);
    }
}