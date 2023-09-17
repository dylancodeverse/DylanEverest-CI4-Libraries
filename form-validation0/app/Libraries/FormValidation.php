<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class FormValidation extends BaseController {


    // need to be lowercased
    protected array $allowedMethods = ['post', 'get'];

    protected $helpers = ['form'];

    public function verification ($rules=null , $errors =null) 
    {

        if (!in_array($this->request->getMethod(false), $this->allowedMethods, true)) {

            return false;

        }

        return $this->validate($rules,$errors);

    }

}