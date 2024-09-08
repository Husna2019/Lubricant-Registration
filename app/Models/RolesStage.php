<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesStage extends Model
{
  use HasFactory;
  protected $fillable = [
    'stage_id',
    'role_id'
  ];
}
