<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'description',
    'created_by'
  ];

  public function users()
  {
    return $this->hasManyThrough(UserRole::class, "role_id", "id");
  }

  
}
