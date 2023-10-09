<?php
namespace App\Libraries;

class DataFormPrepa
{
    public function getDataForm ($method)
    {
        $userData =[];
        if ( strtolower($method) =='post') 
        {
            foreach ($_POST as $key => $value) 
            {
                $userData= $this->translate($userData, $key, $value);

            }
        }
        elseif (strtolower($method) =='get')
        {
            foreach ($_GET as $key => $value) 
            {
                $userData= $this->translate($userData, $key, $value);
            }
        }        
        var_dump($userData);
        return $userData;
    }

    private function translate($array,$key, $value)
    {
        if(is_array($value)) 
        {
            foreach($value as $key1 => $value2)
            {
                $array[$key1]=$value2;
            }
        }
 
        elseif (!empty(json_decode($value))) 
        {
            $arrayAssoc = json_decode($value,true);             

            foreach($arrayAssoc as $key1 => $value2)
            {
                $array[$key1] =$value2 ;
            }
                
        }
 
        else
        {
            $array[$key] = $value;
        }

        return $array;
    }



}