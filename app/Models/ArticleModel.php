<?php 
namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id_article';
    protected $allowedFields = ['reference', 'designation', 'description'];
    
    // Si vous souhaitez utiliser les timestamps
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    
    // Validation
    protected $validationRules = [
        'reference' => 'required|min_length[3]|is_unique[article.reference,id_article,{id_article}]',
        'designation' => 'required|min_length[3]',
        'description' => 'permit_empty'
    ];
    
    protected $validationMessages = [
        'reference' => [
            'required' => 'La référence est obligatoire',
            'min_length' => 'La référence doit comporter au moins 3 caractères',
            'is_unique' => 'Cette référence existe déjà'
        ],
        'designation' => [
            'required' => 'La désignation est obligatoire',
            'min_length' => 'La désignation doit comporter au moins 3 caractères'
        ]
    ];
    
    // Relations avec les autres modèles
    public function lignesFacture()
    {
        return $this->hasMany('App\Models\LigneFactureModel', 'id_article');
    }
    
    public function paniers()
    {
        return $this->hasMany('App\Models\PanierArticleModel', 'id_article');
    }
    
    // Méthode pour récupérer les lignes de facture associées à cet article
    public function getLignesFacture($id_article)
    {
        $ligneFactureModel = new \App\Models\LigneFactureModel();
        return $ligneFactureModel->where('id_article', $id_article)->findAll();
    }
    
    // Méthode pour vérifier si l'article est utilisé dans une ligne de facture
    public function isUsedInLigneFacture($id_article)
    {
        $ligneFactureModel = new \App\Models\LigneFactureModel();
        $count = $ligneFactureModel->where('id_article', $id_article)->countAllResults();
        return ($count > 0);
    }
    
    // Méthode pour rechercher des articles par référence ou désignation
    public function search($keyword)
    {
        return $this->like('reference', $keyword)
                    ->orLike('designation', $keyword)
                    ->findAll();
    }
}