<?php
namespace App\Models;

use CodeIgniter\Model;

class LigneCommandeModel extends Model
{
    protected $table = 'lignecommande';
    protected $primaryKey = 'id';
    protected $allowedFields = ['libelle', 'qte'];
}
