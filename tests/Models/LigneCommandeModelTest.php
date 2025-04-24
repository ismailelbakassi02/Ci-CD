<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneCommandeModel;
use PHPUnit\Framework\Attributes\Test;

class LigneCommandeModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->createMock(LigneCommandeModel::class);
    }

    #[Test]
    public function test_find_all_lignecommandes()
    {
        $expected = [
            ['libelle' => 'Produit X', 'qte' => 2],
            ['libelle' => 'Produit Y', 'qte' => 1],
        ];

        $this->model->method('findAll')->willReturn($expected);

        $result = $this->model->findAll();
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    #[Test]
    public function test_insert_lignecommande()
    {
        $data = ['libelle' => 'Produit Test', 'qte' => 5];

        $this->model->method('insert')->willReturn(1);

        $id = $this->model->insert($data);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }
}
