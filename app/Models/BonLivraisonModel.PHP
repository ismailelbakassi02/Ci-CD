<?php
namespace App\Models;

use CodeIgniter\Model;

class BonLivraisonModel extends Model
{
    protected $table = 'bonlivraison';
    protected $primaryKey = 'id';
    protected $allowedFields = ['commande', 'client'];
}
