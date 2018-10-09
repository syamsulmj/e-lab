<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers;
use App\Admin;
use App\LecturerRegisteredClass;
use App\StudentClass;
use App\Assignment;
use App\StudentReport;
use App\User;

class AdminController extends Controller
{
    public function create_account() {

      if (session('login?')) {

        return view('admin.create_account');
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function create(Request $req) {
      $req->validate([
        'name' => 'required',
        'matrix_number' => 'required',
        'faculty' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'role' => 'required'
      ]);

      $name = Helpers::raw($req->input('name'));
      $matrix_number = $req->input('matrix_number');
      $faculty = Helpers::raw($req->input('faculty'));
      $email = $req->input('email');
      $phone_number = $req->input('phone_number');
      $role = Helpers::raw($req->input('role'));

      Admin::create([
        'name' => $name,
        'matrix_number' => $matrix_number,
        'faculty' => $faculty,
        'email' => $email,
        'phone_number' => $phone_number,
        'role' => $role,
        'password' => 'elab123'
      ]);

      return redirect()->back()->with(['success' => 'You have successfully created a new account.']);
    }

    public function registered_class() {

      if (session('login?')) {
        $registered_class = LecturerRegisteredClass::where('matrix_number', session('matrix_number'))->orderBy('created_at', 'desc')->get();

        return view(
          'admin.registered_class',
          compact('registered_class')
        );
      }
      else {
        return redirect()->action('HomeController@index');
      }
    }

    public function register_new_class(Request $req) {
      $req->validate([
        'class' => 'required'
      ]);

      $class_name = $req->input('class');

      LecturerRegisteredClass::create([
        'matrix_number' => session('matrix_number'),
        'class' => $class_name
      ]);

      return redirect()->back()->with(['success' => 'You have successfully registered a new class']);
    }

    public function delete_class($matrix_number, $class_name) {
      LecturerRegisteredClass::where('matrix_number', $matrix_number)->where('class', $class_name)->delete();

      return redirect()->back()->with(['success' => 'You have successfully deleted class '.$class_name.' from your system.']);
    }

    public function update_class($matrix_number, $class_name, Request $req) {
      $req->validate([
        'class' => 'required'
      ]);

      $update = ['class' => $req->input('class')];

      LecturerRegisteredClass::where('matrix_number', $matrix_number)->where('class', $class_name)->update($update);

      return redirect()->back()->with(['success' => 'You have successfully update class '.$class_name.' into class '.$req->input('class')]);
    }

    public function upload_assignment() {
      if (session('login?')) {
        $registered_class = LecturerRegisteredClass::where('matrix_number', session('matrix_number'))->get();

        return view(
          'admin.upload_assignment',
          compact('registered_class')
        );
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function lecturer_students_report() {
      if (session('login?')) {
        $registered_class = LecturerRegisteredClass::where('matrix_number', session('matrix_number'))->get();

        return view(
          'admin.student_reports',
          compact('registered_class')
        );
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function lecturer_profile() {
      if (session('login?')) {
        $user = Admin::where('matrix_number', session('matrix_number'))->get();
        return view(
          'admin.lecturer_profile',
          compact('user')
        );
      }
      else {
        return redirect()->action('HomeController@login');
      }
    }

    public function lecturer_profile_update(Request $req) {
      $req->validate([
        'name' => 'required',
        'matrix-number' => 'required',
        'faculty' => 'required',
        'email' => 'required',
        'phone-number' => 'required'
      ]);

      $name = Helpers::raw($req->input('name'));
      $matrix_number = $req->input('matrix-number');
      $faculty = $req->input('faculty');
      $email = $req->input('email');
      $phone_number = $req->input('phone-number');

      $update = [
        'name' => $name,
        'matrix_number' => $matrix_number,
        'faculty' => $faculty,
        'email' => $email,
        'phone_number' => $phone_number
      ];

      Admin::where('matrix_number', session('matrix_number'))->update($update);

      return redirect()->back()->with(['success' => 'You have successfully updated your information.']);
    }

    public function admin_update_password(Request $req) {
      $req->validate([
        'new-password' => 'required'
      ]);

      $new_password = $req->input('new-password');

      $update = [
        'password' => $new_password
      ];

      Admin::where('matrix_number', session('matrix_number'))->update($update);

      return redirect()->back()->with(['success' => 'You have successfully change your password.']);
    }
}
