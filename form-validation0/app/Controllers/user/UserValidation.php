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

        $this->validView = 'form/success_page' ;
        $this->nonValidView ='form/signup';

        return $this->verification($this->signupRules);

    }

}