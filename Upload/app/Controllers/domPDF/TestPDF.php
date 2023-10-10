<?php

namespace App\Controllers\domPDF;

use App\Controllers\BaseController;
use Dompdf\Dompdf ;

class TestPDF extends BaseController
{
    public function index()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('testPDF/ViewPdf'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();

        
    }
    public function testView()
    {
        return view('testPDF/ViewPdf');
    }
    
}
