<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
      'name',
      'matrix_number',
      'faculty',
      'email',
      'phone_number',
      'role',
      'password'
    ];
}
