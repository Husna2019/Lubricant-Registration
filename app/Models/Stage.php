<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;




class Stage extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',

  ];

  public function companyDetail()
  {
    return $this->belongsTo(CompanyDetail::class, "company_detail_id", "id");
  }
}
