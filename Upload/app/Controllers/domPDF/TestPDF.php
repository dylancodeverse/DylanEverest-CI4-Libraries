<?php

namespace App\Controllers\domPDF;

use App\Controllers\BaseController;
use App\Libraries\PdfGenerator;

class TestPDF extends BaseController
{
    public function index()
    {
        $generator = new PdfGenerator();
        $generator->generatePDF('testPDF/ViewPdf');
    }
    public function testView()
    {
        return view('testPDF/ViewPdf');
    }
    
}
