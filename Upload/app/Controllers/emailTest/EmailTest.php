<?php

namespace App\Controllers\emailTest;

use App\Controllers\BaseController;
use App\Libraries\EmailSender;

class EmailTest extends BaseController
{
    public function index()
    {
        

        $emailSender = new EmailSender(null,'mertinatotobisous@gmail.com' ,"iljr mseq pjmo scgr" );
        $data = [
            'fromMail' => 'ratianarivonyvoara@gmail.com',
            'yourName' => 'Dylan Ratianarivo',
            'toMail' => 'ratianarivodylan@gmail.com',
            'subject' => 'Sample Subject',
            'message' => 'Hello, this is a sample message. Goodbye !!!'
        ];


        echo $emailSender->sendEmail($data);
    }

    public function css()
    {
        return view("testFront/TestFront");
    }
}

// iljr mseq pjmo scgr