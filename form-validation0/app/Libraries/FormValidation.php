<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class FormValidation extends BaseController {

    /**
     * 
     */
    protected $rules =[];

    /**
     * 
     */
    protected $errors = [] ;

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
    protected array $validViewOptions =[];
    
    /**
     * 
     */
    protected $nonValidView='' ;
    
    /**
     * 
     */
    protected array $nonValidViewOptions= [] ;



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
    public function verification ($rules = null, $errors = null)
    {

        if ($rules === null) 
        {
            $rules = $this->rules;
        }

        if ($errors === null) 
        {
            $errors = $this->errors;
        }

        if($this->isValidDatas( $rules , $errors))
        {
            return view ($this->validView,$this->validViewOptions) ;
        }

        return view ($this->nonValidView , $this->nonValidViewOptions) ;

    }

}