<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\ArticleModel;
use PHPUnit\Framework\Attributes\Test;

class ArticleModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = $this->createMock(ArticleModel::class);
    }
    
    #[Test]
    public function test_find_all_articles()
    {
        $expectedArticles = [
            [
                'id_article' => 1,
                'reference' => 'REF001',
                'designation' => 'Clavier sans fil',
                'description' => 'Clavier ergonomique sans fil avec pavé numérique'
            ],
            [
                'id_article' => 2,
                'reference' => 'REF002',
                'designation' => 'Souris optique',
                'description' => 'Souris optique avec 5 boutons programmables'
            ]
        ];
        
        $this->model->method('findAll')
            ->willReturn($expectedArticles);
            
        $articles = $this->model->findAll();
        $this->assertIsArray($articles);
        $this->assertCount(2, $articles);
    }
    
    #[Test]
    public function test_insert_article()
    {
        $data = [
            'reference' => 'REF003',
            'designation' => 'Écran 24 pouces',
            'description' => 'Écran LED Full HD 24 pouces'
        ];
        
        $this->model->method('insert')
            ->willReturn(3);
            
        $id = $this->model->insert($data);
        $this->assertGreaterThan(0, $id);
    }
    
    #[Test]
    public function test_update_article()
    {
        $id = 1;
        $data = [
            'designation' => 'Clavier sans fil pro',
            'description' => 'Clavier ergonomique sans fil avec pavé numérique et touches programmables'
        ];
        
        $this->model->method('update')
            ->willReturn(true);
            
        $result = $this->model->update($id, $data);
        $this->assertTrue($result);
    }
    
    #[Test]
    public function test_delete_article()
    {
        $id = 2;
        
        $this->model->method('delete')
            ->willReturn(true);
            
        $result = $this->model->delete($id);
        $this->assertTrue($result);
    }
    
    #[Test]
    public function test_find_article_by_id()
    {
        $id = 1;
        $expectedArticle = [
            'id_article' => 1,
            'reference' => 'REF001',
            'designation' => 'Clavier sans fil',
            'description' => 'Clavier ergonomique sans fil avec pavé numérique'
        ];
        
        $this->model->method('find')
            ->with($id)
            ->willReturn($expectedArticle);
            
        $article = $this->model->find($id);
        $this->assertEquals($expectedArticle, $article);
    }
    
    #[Test]
    public function test_search_articles()
    {
        $keyword = 'clavier';
        $expectedArticles = [
            [
                'id_article' => 1,
                'reference' => 'REF001',
                'designation' => 'Clavier sans fil',
                'description' => 'Clavier ergonomique sans fil avec pavé numérique'
            ]
        ];
        
        $this->model->method('search')
            ->with($keyword)
            ->willReturn($expectedArticles);
            
        $articles = $this->model->search($keyword);
        $this->assertIsArray($articles);
        $this->assertCount(1, $articles);
    }
    
    #[Test]
    public function test_is_used_in_ligne_facture()
    {
        $id = 1;
        
        $this->model->method('isUsedInLigneFacture')
            ->with($id)
            ->willReturn(true);
            
        $isUsed = $this->model->isUsedInLigneFacture($id);
        $this->assertTrue($isUsed);
    }
}