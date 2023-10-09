<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class Uploader extends BaseController
{
    
    public function upldoad($fileName)
    {
        $file = $this->request->getFile($fileName);
        if (! $file->hasMoved()) 
        {
            $filepath = WRITEPATH . 'uploads/' . $file->store();

        }
    }
    
}
