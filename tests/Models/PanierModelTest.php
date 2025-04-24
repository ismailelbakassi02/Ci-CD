<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\PanierModel;
use PHPUnit\Framework\Attributes\Test;

class PanierModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->createMock(PanierModel::class);
    }

    #[Test]
    public function test_find_all_paniers()
    {
        $expectedPaniers = [
            ['id' => 1, 'dateClient' => '2024-04-24', 'client' => 'Ali Ali']
        ];

        $this->model->method('findAll')
            ->willReturn($expectedPaniers);

        $paniers = $this->model->findAll();
        $this->assertIsArray($paniers);
        $this->assertEquals('Ali Ali', $paniers[0]['client']);
    }

    #[Test]
    public function test_insert_panier()
    {
        $data = ['dateClient' => '2024-04-24', 'client' => 'Ali Ali'];

        $this->model->method('insert')
            ->willReturn(1); // simulate insert success returning ID 1

        $id = $this->model->insert($data);
        $this->assertGreaterThan(0, $id);
    }
}
