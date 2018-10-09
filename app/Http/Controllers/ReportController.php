<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentReport;
use App\Assignment;
use App\StudentClass;
use App\User;
use App\Http\Helpers;

class ReportController extends Controller
{
    public function new_report() {
      if (session('login?')) {
        return view('report.new_report');
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function create_report(Request $req) {
      $req->validate([
        'title' => 'required'
      ]);


      $title = Helpers::raw($req->input('title'));
      $introduction = $req->input('introduction');
      $problem_statement = $req->input('problem-statement');
      $objective = $req->input('objective');
      $procedure = $req->input('procedure');
      $results = $req->input('results');
      $discussion = $req->input('discussion');
      $conclusion = $req->input('conclusion');
      $reference = $req->input('reference');

      StudentReport::create([
        'matrix_number' => session('matrix_number'),
        'title' => $title,
        'introduction' => $introduction,
        'problem_statement' => $problem_statement,
        'objective' => $objective,
        'procedure' => $procedure,
        'results' => $results,
        'discussion' => $discussion,
        'conclusion' => $conclusion,
        'reference' => $reference
      ]);

      $new_created_report = StudentReport::where('matrix_number', session('matrix_number'))->where('title', $title)->first();

      return redirect()->route('student_report', ['matrix_number' => session('matrix_number'), 'id' => $new_created_report->id]);
    }

    public function report_editing($id) {
      if (session('login?')) {
        $report = StudentReport::where('matrix_number', session('matrix_number'))->where('id', $id)->get();

        return view(
          'report.edit_report',
          compact('report')
        );
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function edit_report(Request $req, $id) {
      $req->validate([
        'title' => 'required'
      ]);

      $title = Helpers::raw($req->input('title'));
      $introduction = $req->input('introduction');
      $problem_statement = $req->input('problem-statement');
      $objective = $req->input('objective');
      $procedure = $req->input('procedure');
      $results = $req->input('results');
      $discussion = $req->input('discussion');
      $conclusion = $req->input('conclusion');
      $reference = $req->input('reference');

      $update = [
        'title' => $title,
        'introduction' => $introduction,
        'problem_statement' => $problem_statement,
        'objective' => $objective,
        'procedure' => $procedure,
        'results' => $results,
        'discussion' => $discussion,
        'conclusion' => $conclusion,
        'reference' => $reference
      ];

      StudentReport::where('matrix_number', session('matrix_number'))->where('id', $id)->update($update);

      return redirect()->route('student_report', ['matrix_number' => session('matrix_number'), 'id' => $id]);
    }

    public function generate_report($matrix_number, $id) {
      $report = StudentReport::where('matrix_number', $matrix_number)->where('id', $id)->first();
      $student = User::where('matrix_number', $matrix_number)->first();

      return view(
        'report.generate_report',
        compact('report', 'student')
      );
    }

    public function send2whatsapp(Request $req) {
      $req->validate([
        'phone-number' => 'required'
      ]);
      $phone_number = $req->input('phone-number');
      $get_current_url = $req->input('current-url');
      return redirect('https://api.whatsapp.com/send?phone=60'.$phone_number.'&text=Here%20is%20my%20report%20"'.$get_current_url.'"%20hopefully%20you%20can%20review%20my%20report.%20Thank%20you.');
    }
}
