<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UserModel;
use PHPUnit\Framework\Attributes\Test;

class UserModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    
    protected $refresh = true;
    protected $migrate = true;
    protected $migrateOnce = false;
    
    protected function setUp(): void
    {
        parent::setUp();
    }
    
    #[Test]
    public function test_find_all_users()
    {
        $model = new UserModel();
        $users = $model->findAll();
        
        $this->assertIsArray($users, "findAll retourne un tableau !");
    }
    
    #[Test]
    public function test_insert_user()
    {
        $model = new UserModel();
        $data = ['name' => 'Jamila Dahi', 'email' => 'jda@gk.mt'];
        $id = $model->insert($data);
        
        $this->assertGreaterThan(0, $id, "ID user inséré > 0");
    }
}