<?php 
namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();
        return view('article/list', $data);
    }

    public function create()
    {
        return view('article/create');
    }
    
    public function store()
    {
        $model = new ArticleModel();
        
        $data = [
            'reference' => $this->request->getPost('reference'),
            'designation' => $this->request->getPost('designation'),
            'description' => $this->request->getPost('description')
        ];
        
        $model->insert($data);
        return redirect()->to('/article');
    }
    
    public function edit($id)
    {
        $model = new ArticleModel();
        $data['article'] = $model->find($id);
        
        return view('article/edit', $data);
    }
    
    public function update($id)
    {
        $model = new ArticleModel();
        
        $data = [
            'reference' => $this->request->getPost('reference'),
            'designation' => $this->request->getPost('designation'),
            'description' => $this->request->getPost('description')
        ];
        
        $model->update($id, $data);
        return redirect()->to('/article');
    }
    
    public function delete($id)
    {
        $model = new ArticleModel();
        $model->delete($id);
        return redirect()->to('/article');
    }
    
    public function view($id)
    {
        $model = new ArticleModel();
        $data['article'] = $model->find($id);
        
        // Récupérer les lignes de facture associées à cet article
        $data['lignesFacture'] = $model->getLignesFacture($id);
        
        return view('article/view', $data);
    }
}