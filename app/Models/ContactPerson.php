<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\CompanyDetail;



class ContactPerson extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'title',
    'address2',
    'cellphone',
    'cellphone1',
    'email2',
    'company_detail_id'
  ];

  public function companyDetail()
  {
      return $this->belongsTo(CompanyDetail::class, 'company_detail_id', 'id');
  }
}
