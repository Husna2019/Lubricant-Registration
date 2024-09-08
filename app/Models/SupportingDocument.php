<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportingDocument extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'type',
    'path',
    'extension',
    'size',
    'company_detail_id',
    // 'brand_ownership',
    // 'certification_bodies',
    // 'tbs_licence',
    // 'equipment_manufacturer',
    // 'company_detail_id',
  ];
}
