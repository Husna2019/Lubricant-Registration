<?php

namespace App\Exports;

use App\Models\CompanyDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompanyDetailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CompanyDetail::with('lubricantDetails')
            ->where('status', 'Approved') // Optional: Adjust based on your filter
            ->get();
    }
    public function headings(): array
    {
        return [
            'Application Number', 
            'Lubricant Name', 
            'Lubricant Type', 
            'Lubricant Performance Level',
            'Lubricant Brand',
            'Certification Name', 
            'Status'
        ];
    }

    public function map($detail): array
    {
        return [
            $detail->application_number,
            $detail->lubricantDetails->pluck('lubricant_name')->implode(', '),
            $detail->lubricantDetails->pluck('lubricant_type')->implode(', '),
            $detail->lubricantDetails->pluck('lubricant_performance_level')->implode(', '),
            $detail->lubricantDetails->pluck('lubricant_brand')->implode(', '),
            $detail->supportingDocuments->pluck('name')->implode(', '),
            $detail->status
        ];
    }
}
