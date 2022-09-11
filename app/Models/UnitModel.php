<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    // Setup DB table
    protected $table = 'units';

    // Get all units
    public function getAllUnits(){
        $units = $this->findAll();
        if (empty($units)) {
            return NULL;
        }
        else{
            return $units;
        }
    }
}


