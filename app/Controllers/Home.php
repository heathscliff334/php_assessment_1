<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\HomeModel;

class Home extends BaseController{
    public function __construct(){
        $this->home = new HomeModel();
    }
    public function index(){
      
            $data = array(  'title' => 'Login Form',
                            'content' => 'Sorry, the page you are looking for could not be found.');
            return view('home/home', $data);   
        
        
    }
}
