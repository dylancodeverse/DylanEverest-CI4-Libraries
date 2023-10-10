<?php

namespace App\Controllers\testupload;

use App\Controllers\BaseController;
use App\Libraries\Uploader;

class TestUpload extends BaseController 
{
    public function index()
    {
        return view( "testUpload/VUpload");
    }
    public function testUpload()
    {

        $upload= new Uploader();
        echo $upload->uploadSingle($this->request,"file[]");

    }
}