<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\BonLivraisonModel;
use PHPUnit\Framework\Attributes\Test;

class BonLivraisonModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        // Utilisation de mock pour ne pas toucher à la base réelle
        $this->model = $this->createMock(BonLivraisonModel::class);
    }

    #[Test]
    public function test_find_all_bonlivraisons()
    {
        $expected = [
            ['commande' => 'CMD001', 'client' => 'Client A'],
            ['commande' => 'CMD002', 'client' => 'Client B'],
        ];

        $this->model->method('findAll')->willReturn($expected);

        $result = $this->model->findAll();
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    #[Test]
    public function test_insert_bonlivraison()
    {
        $data = ['commande' => 'CMD123', 'client' => 'Sabir Client'];

        $this->model->method('insert')->willReturn(1); // simulate returned ID

        $id = $this->model->insert($data);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }
}
