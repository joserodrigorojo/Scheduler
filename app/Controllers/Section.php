<?php
namespace App\Controllers;

use App\Models\SectionModel;

class Section extends BaseController
{
    public function index(){
        $model = new SectionModel();
        $sections = $model->getAllSection();
        if (empty($sections)) {
            return $this->getResponse(['error' => 'Sections not found'], 404);
        }
        else{
            return $this->getResponse($sections);
            }
    }
}