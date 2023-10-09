<?php
namespace App\Libraries;

class DataFormPrepa
{

    protected $method = 'POST';

    public function getDataForm ()
    {
        $userData =[];

        foreach ($_POST as $key => $value) {
            $userData[$key] = $value;            
        }
        var_dump($userData);
    }
}