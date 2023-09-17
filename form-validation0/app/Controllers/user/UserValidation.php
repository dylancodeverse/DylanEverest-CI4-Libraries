<?php

namespace app\Controllers\user ;

use App\Libraries\FormValidation;

class UserValidation extends FormValidation {

    protected $rules = [

        'username' => 'required',
        'password' => 'required|min_length[10]',
        'passconf' => 'required|matches[password]',
        'email'    => 'required|valid_email',

    ];
    protected $validView = 'form/success_page' ;

    protected $nonValidView ='form/signup';

    protected ?string $methodAfterValidation = 'coucou' ;


    public function index()
    {

        return $this->verification($this->rules);

    }

    public function coucou()
    {
        echo 'coucou' ;
    }

}