<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturerRegisteredClass extends Model
{
    protected $fillable = [
      'matrix_number',
      'class'
    ];
}
