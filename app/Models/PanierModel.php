<?php 
namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'panier';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dateClient', 'client'];
}
