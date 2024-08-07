<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = [])
    {
        if (!session()->get('isLoggedIn') && ( !is_array($arguments) || (is_array($arguments) && !in_array('not_loggedin',$arguments)) )){
            return redirect()->to('/login');
        }elseif (session()->get('isLoggedIn') && ( (is_array($arguments) && in_array('not_loggedin',$arguments)) )){
            return redirect()->to('/');
        }elseif(session()->get('isLoggedIn') && is_array($arguments) && !in_array(session()->get('user')['role'],$arguments)){
            return redirect()->to('/');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}