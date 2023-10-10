<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use Exception;

class Uploader extends BaseController
{
    public function __construct()
    {
        
    }

    public function uploadSingle(CLIRequest|IncomingRequest $request,string $fileName)
    {
        $file = $request->getFile($fileName);

        if (! $file->hasMoved()) 
        {
            $filepath = WRITEPATH . 'uploads/' . $file->store();

            return $filepath;
        }
        return null;
    }

    public function uploadGroupFile(CLIRequest|IncomingRequest $request, array $fileNames)
    {
        $result =null;
        foreach ($fileNames as $fileName) 
        {
            try 
            {
                $result[]= $this->uploadSingle($request , $fileName);
            } 
            catch (\Throwable $th) 
            {
                $file = $request->getFiles($fileName);

                array_merge($result ,$this->arrayFilesTreatement($request,$file)) ;

            }
        }

    }

    private function arrayFilesTreatement(CLIRequest|IncomingRequest $request, array $files)
    {
        $result =array() ;

        foreach ($files as $file) 
        {
            if (is_array($file)) 
            {
                array_merge($result,$this->arrayFilesTreatement($request,$file));
            }
            else
            {
                if (! $file->hasMoved()) 
                {
                    $filepath = WRITEPATH . 'uploads/' . $file->store();
        
                    $result [] = $filepath;
                }
                throw new Exception ("ERROR");
            }
        }
        return $result ;

    }
    
}
