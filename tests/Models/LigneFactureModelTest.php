<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneFactureModel;
use PHPUnit\Framework\Attributes\Test;

class LigneFactureModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->createMock(LigneFactureModel::class);
    }
    
    #[Test]
    public function test_find_all_lignes_facture()
    {
        $expectedLignesFacture = [
            [
                'id_ligneFacture' => 1,
                'id_facture' => 1,
                'id_article' => 1,
                'quantite' => 2,
                'prix_unitaire' => 10.50
            ],
            [
                'id_ligneFacture' => 2,
                'id_facture' => 1,
                'id_article' => 2,
                'quantite' => 1,
                'prix_unitaire' => 25.75
            ]
        ];
        
        $this->model->method('findAll')
            ->willReturn($expectedLignesFacture);
            
        $lignesFacture = $this->model->findAll();
        $this->assertIsArray($lignesFacture);
        $this->assertCount(2, $lignesFacture);
    }
    
    #[Test]
    public function test_insert_ligne_facture()
    {
        $data = [
            'id_facture' => 2,
            'id_article' => 3,
            'quantite' => 5,
            'prix_unitaire' => 15.99
        ];
        
        $this->model->method('insert')
            ->willReturn(3);
            
        $id = $this->model->insert($data);
        $this->assertGreaterThan(0, $id);
    }
    
    #[Test]
    public function test_update_ligne_facture()
    {
        $id = 1;
        $data = [
            'quantite' => 3,
            'prix_unitaire' => 12.75
        ];
        
        $this->model->method('update')
            ->willReturn(true);
            
        $result = $this->model->update($id, $data);
        $this->assertTrue($result);
    }
    
    #[Test]
    public function test_delete_ligne_facture()
    {
        $id = 2;
        
        $this->model->method('delete')
            ->willReturn(true);
            
        $result = $this->model->delete($id);
        $this->assertTrue($result);
    }
    
    #[Test]
    public function test_get_montant_total()
    {
        $id = 1;
        $ligneFacture = [
            'id_ligneFacture' => 1,
            'id_facture' => 1,
            'id_article' => 1,
            'quantite' => 4,
            'prix_unitaire' => 9.99
        ];
        
        $expectedTotal = 39.96; // 4 * 9.99
        
        $this->model->method('find')
            ->willReturn($ligneFacture);
            
        $this->model->method('getMontantTotal')
            ->willReturn($expectedTotal);
            
        $total = $this->model->getMontantTotal($id);
        $this->assertEquals($expectedTotal, $total);
    }
}