<?php

namespace App\Models;

use CodeIgniter\Model;

class SectionModel extends Model
{
    // Setup DB table
    protected $table = 'sections';

    // Get all sections
    public function getAllSections(){
        $sections = $this->findAll();
        if (empty($sections)) {
            return NULL;
        }
        else{
            return $sections;
        }
    }
}



