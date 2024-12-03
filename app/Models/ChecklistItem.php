<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'items',
        'remark',
        'response',
        'recommendation',
        'company_detail_id'
      ];

      public function companyDetail()
      {
          return $this->belongsTo(CompanyDetail::class, 'company_detail_id', 'id');
      }
}
