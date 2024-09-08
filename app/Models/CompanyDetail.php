<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactPerson;

class CompanyDetail extends Model
{
  use HasFactory;

  protected $fillable = [
    'company_name',
    'license',
    'region',
    'block',
    'address',
    'telephone',
    'email',
    'user_id'
  ];

   public function person()
   {
     return $this->hasMany(ContactPerson::class, "company_detail_id", "id");
   }
}
