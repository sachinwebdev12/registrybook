<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['main_content'] = 'pages/home';
        return view('dashboard/template',$data);
    }
}
