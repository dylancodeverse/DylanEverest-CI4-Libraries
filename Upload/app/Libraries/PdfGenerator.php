<?php 

namespace App\Libraries ;
use Dompdf\Dompdf;
class PdfGenerator 
{
    /**
     * Tsy maintsy ao anatinle HTML ihany ny css.
     * Tsy tsara mampiasa bootstrap fa minana performance
     */
    public function generatePDF($viewPath , $fileNameOutPut="document.pdf")
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view($viewPath));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($fileNameOutPut);
    }
}
