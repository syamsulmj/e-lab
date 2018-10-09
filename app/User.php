<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable =
  [
    'name',
    'matrix_number',
    'ic_number',
    'faculty',
    'programme',
    'part',
    'group',
    'email',
    'phone_number',
    'password'
  ];

  static function get_user_class($class) {

    return User::where('group', $class)->get();
  }
}
