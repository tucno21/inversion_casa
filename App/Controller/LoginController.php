<?php

namespace App\Controller;

use App\Model\User;
use App\System\Controller;

class LoginController extends Controller
{
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new User();
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function index()
    {
        return view('login', []);
    }

    public function login()
    {
        $data = $this->request()->isPost();

        $valid = $this->validate($data, [
            'username' => 'required|not_unique:User,username',
            'password' => 'required|password_verify:User,username',
        ]);

        if ($valid !== true) {

            return $this->view('login', [
                'err' =>  $valid,
                'data' => (object)$data,
            ]);
        } else {

            $user = $this->homeModel->columns('id, name, username')->where('username', $data['username'])->first();

            $this->sessionSet('user', $user);

            return $this->redirect('dashboard');
        }

        return view('login');
    }


    public function logout()
    {
        // session_start();
        // session_destroy();
        $this->sessionDestroy('user');
        return $this->redirect('/');
    }
}
