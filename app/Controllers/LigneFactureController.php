<?php 
namespace App\Controllers;

use App\Models\LigneFactureModel;
use App\Models\FactureModel;
use App\Models\ArticleModel;

class LigneFactureController extends BaseController
{
    public function index()
    {
        $model = new LigneFactureModel();
        $data['lignesFacture'] = $model->findAll();
        return view('ligne_facture/list', $data);
    }

    public function create()
    {
        $factureModel = new FactureModel();
        $articleModel = new ArticleModel();
        
        $data['factures'] = $factureModel->findAll();
        $data['articles'] = $articleModel->findAll();
        
        return view('ligne_facture/create', $data);
    }
    
    public function store()
    {
        $model = new LigneFactureModel();
        
        $data = [
            'id_facture' => $this->request->getPost('id_facture'),
            'id_article' => $this->request->getPost('id_article'),
            'quantite' => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire')
        ];
        
        $model->insert($data);
        return redirect()->to('/lignefacture');
    }
    
    public function edit($id)
    {
        $model = new LigneFactureModel();
        $factureModel = new FactureModel();
        $articleModel = new ArticleModel();
        
        $data['ligneFacture'] = $model->find($id);
        $data['factures'] = $factureModel->findAll();
        $data['articles'] = $articleModel->findAll();
        
        return view('ligne_facture/edit', $data);
    }
    
    public function update($id)
    {
        $model = new LigneFactureModel();
        
        $data = [
            'id_facture' => $this->request->getPost('id_facture'),
            'id_article' => $this->request->getPost('id_article'),
            'quantite' => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire')
        ];
        
        $model->update($id, $data);
        return redirect()->to('/lignefacture');
    }
    
    public function delete($id)
    {
        $model = new LigneFactureModel();
        $model->delete($id);
        return redirect()->to('/lignefacture');
    }
    
    public function view($id)
    {
        $model = new LigneFactureModel();
        $data['ligneFacture'] = $model->find($id);
        return view('ligne_facture/view', $data);
    }
}