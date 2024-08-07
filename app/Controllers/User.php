<?php 
namespace App\Controllers;

class User extends BaseController
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('pages/register',$data);
    }
}