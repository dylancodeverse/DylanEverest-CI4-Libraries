<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class FormValidation extends BaseController {

    /**
     * Array of all allowed methods request and always set it to lowercase
     * @var array
     */
    protected array $allowedMethods = ['post'];

    /**
     * 
     */
    protected $validView='' ;
    
    /**
     * 
     */
    protected $nonValidView='' ;
    


    protected $helpers = ['form'];

    /**
     * Data validation
     */

    public function isValidDatas ($rules=null , $errors =[]) 
    {

        if (!in_array($this->request->getMethod(false), $this->allowedMethods, true)) {

            return false;

        }

        return $this->validate($rules,$errors);

    }

    /**
     * Main function for form validation
     */
    public function verification ($rules=null , $errors =[])
    {
        if($this->isValidDatas($rules , $errors))
        {
            return view ($this->validView) ;
        }
        return view ($this->nonValidView) ;
    }

}