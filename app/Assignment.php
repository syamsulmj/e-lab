<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['class', 'title', 'class_directory'];

    static function get_file_list($class) {

      return Assignment::where('class', $class)->get();
    }
}
