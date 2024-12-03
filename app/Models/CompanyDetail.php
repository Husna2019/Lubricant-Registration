<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactPerson;
use App\Models\LubricantDetails;
use App\Models\SupportingDocuments;

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

   // Relationship with ContactPerson
   public function contactPeople()
   {
       return $this->hasMany(ContactPerson::class, 'company_detail_id', 'id');
   }
   public function checkList()
   {
       return $this->hasOne(ContactPerson::class, 'company_detail_id', 'id');
   }
   

   // Relationship with LubricantDetail
   public function lubricantDetails()
   {
       return $this->hasMany(LubricantDetail::class, 'company_detail_id');
   }
   
   // Relationship with SupportingDocument
   public function supportingDocuments()
   {
       return $this->hasMany(SupportingDocument::class, 'company_detail_id', 'id');
   }


// Relationship with Application

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

  

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}



}
