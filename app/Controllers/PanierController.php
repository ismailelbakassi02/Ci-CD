<?php 
namespace App\Controllers;

use App\Models\PanierModel;

class PanierController extends BaseController
{
    public function index()
    {
        $model = new PanierModel();
        $data['paniers'] = $model->findAll();
        return view('panier_list', $data);
    }

    public function create()
    {
        return view('create_panier');
    }
}
