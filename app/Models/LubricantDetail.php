<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LubricantDetail extends Model
{
  use HasFactory;
  protected $fillable = [
    'lubricant_name',
    'lubricant_type',
    'lubricant_performance_level',
    'lubricant_brand',
    'certification_name',
    'company_detail_id'
  ];

  public function companyDetail()
  {
    return $this->belongsTo(CompanyDetail::class, "company_detail_id", "id");
  }
}
