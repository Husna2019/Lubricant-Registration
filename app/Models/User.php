<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'email',
    'password',
    'username',
    'first_name',
    'middle_name',
    'surname',
    'gender',
    'phone_number',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  // public function comments()
  //   {
  //       return $this->hasMany(Comment::class);
  //   }

  public function companyDetails()
{
    return $this->hasMany(CompanyDetail::class, 'user_id');
}


    

  //   public function applications()
  //   {
  //       return $this->hasMany(Application::class);
  //   }

  //   public function contactPeople()
  //   {
  //       return $this->hasMany(ContactPerson::class);
  //   }
}
