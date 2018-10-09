<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
  protected $fillable = [
    'matrix_number',
    'title',
    'introduction',
    'problem_statement',
    'objective',
    'procedure',
    'results',
    'discussion',
    'conclusion',
    'reference'
  ];

  static function get_student_report($matrix_number) {

    return StudentReport::where('matrix_number', $matrix_number)->get();
  }
}
