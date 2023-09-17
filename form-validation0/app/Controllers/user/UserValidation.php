<?php

namespace app\Controllers\user ;

use App\Libraries\FormValidation;

class UserValidation extends FormValidation {

    protected $signupRules = [

        'username' => 'required',
        'password' => 'required|min_length[10]',
        'passconf' => 'required|matches[password]',
        'email'    => 'required|valid_email',

    ];

    public function index()
    {
        if ($this->verification($this->signupRules) ) 
        {
            return view('form/success_page');
        }
        return view('form/signup');
    }

}