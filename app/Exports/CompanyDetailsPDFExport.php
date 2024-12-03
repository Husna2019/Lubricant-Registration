<?php

namespace App\Exports;
use App\Models\CompanyDetail;
use Dompdf\Dompdf;
use Dompdf\Options;

use Maatwebsite\Excel\Concerns\FromCollection;

class CompanyDetailsPDFExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
    public function downloadPDF()
    {
        // Fetch company details
        $companyDetails = CompanyDetail::with(['lubricantDetails'])->get();

        // Prepare data for the view
        $data = [
            'companyDetails' => $companyDetails
        ];

        // Render the view and pass the data
        $html = view('export.company_details_pdf', $data)->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();

        // Set options (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass)
        $dompdf->render();

        // Output PDF (force download)
        return $dompdf->stream('company_details.pdf');
    }
}
