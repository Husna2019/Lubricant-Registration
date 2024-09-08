<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;




class Comment extends Model
{
  use HasFactory;
  protected $fillable = [
    'application_id',
    'stage',
    'comment',
    'user_id'

  ];

  public function companyDetail()
  {
    return $this->belongsTo(CompanyDetail::class, "company_detail_id", "id");
  }
}
