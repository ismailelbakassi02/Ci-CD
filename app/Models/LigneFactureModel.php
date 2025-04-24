<?php 
namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model
{
    protected $table = 'ligne_facture';
    protected $primaryKey = 'id_ligneFacture';
    protected $allowedFields = ['id_facture', 'id_article', 'quantite', 'prix_unitaire'];
    
  
    
    // Relations avec les autres modèles
    public function facture()
    {
        return $this->belongsTo('App\Models\FactureModel', 'id_facture');
    }
    
    public function article()
    {
        return $this->belongsTo('App\Models\ArticleModel', 'id_article');
    }
    
    // Méthode pour calculer le montant total de la ligne
    public function getMontantTotal($id = null)
    {
        if ($id === null) {
            return 0;
        }
        
        $ligne = $this->find($id);
        if ($ligne) {
            return $ligne['quantite'] * $ligne['prix_unitaire'];
        }
        
        return 0;
    }
}