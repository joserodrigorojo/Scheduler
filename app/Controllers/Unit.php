<?php
namespace App\Controllers;

use App\Models\UnitModel;

class Unit extends BaseController
{
    public function index(){
        $model = new UnitModel();
        $units = $model->getAllUnits();
        if (empty($units)) {
            return $this->getResponse(['error' => 'Units not found'], 404);
        }
        else{
            return $this->getResponse($units);
            }
    }
}