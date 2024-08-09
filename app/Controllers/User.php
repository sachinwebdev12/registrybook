<?php 
namespace App\Controllers;

use App\Models\Users;
class User extends BaseController
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('pages/register',$data);
    }

    public function registerPost()
    {
        $validation =  \Config\Services::validation();
        $rules = [];
        $rules['organization'] = [
            'label' => 'Organization',
            'rules' => 'required',
        ];
        $rules['email'] = [
            'label' => 'email',
            'rules' => 'required|valid_email|is_unique[users.email]',
        ];
        $rules['mobile_no'] = [
            'label' => 'Mobile number',
            'rules' => 'required',
        ];
        $rules['password'] = [
            'label' => 'password',
            'rules' => 'required|min_length[8]',
        ];
        $rules['confirm-password'] = [
            'label' => 'confirm password',
            'rules' => 'matches[password]',
        ];
        $rules['plan'] = [
            'label' => 'Plan',
            'rules' => 'required',
        ];
        $rules['address'] = [
            'label' => 'Address',
            'rules' => 'required',
        ];

        if($this->validate($rules)){
            $userModel = new Users();
			$token = md5($this->request->getVar('organization').''.time());
            $token_expire_at = date("Y-m-d H:i:s", strtotime("+5 hours"));

            $form_data = [
                'organization'     => $this->request->getVar('organization'),
                'email'            => $this->request->getVar('email'),
                'role'             => "user",
                'mobile_no'        => $this->request->getVar('mobile_no'),
                'address'          => $this->request->getVar('address'),
                'status'           => 1,
                'token'            => $token,
                'token_expired_at' => $token_expire_at,
                'password'         => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $result = $userModel->save($form_data);

            if($result){
                $response['success'] = true;
                session()->setFlashdata('success', 'Registration successfully please login account.');
                $response['redirect'] = base_url('login');
                return $this->response->setJSON($response);
            }else{
                $response['success'] = false;
                $response['message'] = 'Registration fail. please try again';
                return $this->response->setJSON($response);
            }
        }else{
            $response['success'] = false;
            $response['validation'] = $validation->getErrors();
            return $this->response->setJSON($response);
        }
    }
}