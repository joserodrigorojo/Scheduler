<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Front extends Controller {
    public function index(){
        return view('front/index');
    }
}