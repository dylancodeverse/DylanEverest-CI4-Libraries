<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;

class Uploader extends BaseController
{
    public function __construct()
    {
        
    }

    public function upload(CLIRequest|IncomingRequest $request,string $fileName)
    {
        $file = $request->getFile($fileName);
        if (! $file->hasMoved()) 
        {
            $filepath = WRITEPATH . 'uploads/' . $file->store();

            return $filepath;
        }
        return null;
    }
    
}
