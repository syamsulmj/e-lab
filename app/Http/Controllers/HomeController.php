<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Test;
use App\StudentReport;
use App\Http\Helpers;
use App\Assignment;

class HomeController extends Controller
{
    public function index() {

      if (session('login?')) {
        if (session('role') == 'admin' || session('role') == 'lecturer') {
          $admin = Admin::where('matrix_number', session('matrix_number'))->first();

          return view(
            'home.index',
            compact('admin')
          );
        }
        else {
          $user = User::where('matrix_number', session('matrix_number'))->first();
          $student_report = StudentReport::where('matrix_number', session('matrix_number'))->orderBy('created_at', 'desc')->get();
          $files = Assignment::where('class', session('group'))->orderBy('created_at', 'desc')->get();
          return view(
            'home.index',
            compact('user', 'student_report', 'files')
          );
        }

      }
      else {
        return redirect()->action('HomeController@login');
      }

    }

    public function login() {

      return view(
        'home.login'
      );
    }

    public function login_checking(Request $req) {
      $req->validate([
        'matrix-number' => 'required',
        'password' => 'required'
      ]);

      $matrix_number = $req->input('matrix-number');
      $password = $req->input('password');

      if(Admin::where('matrix_number', $matrix_number)->where('password', $password)->count() > 0) {
        $admin = Admin::where('matrix_number', $matrix_number)->first();

        session([
          'login?' => true,
          'matrix_number' => $matrix_number,
          'role' => $admin->role
        ]);

        return redirect()->action('HomeController@index');
      }
      elseif(User::where('matrix_number', $matrix_number)->where('password', $password)->count() > 0) {
        $student = User::where('matrix_number', $matrix_number)->first();

        session([
          'login?' => true,
          'matrix_number' => $matrix_number,
          'group' => $student->group,
          'role' => 'student'
        ]);

        return redirect()->action('HomeController@index');
      }

      else {

        return back()
        ->withErrors(['status' => 'Wrong matrix number or password.'])
        ->with(['matrix-number' => $matrix_number]);
      }
    }

    public function register() {

      return view(
        'home.register'
      );
    }

    public function register_create(Request $req) {
      $req->validate([
        'name' => 'required',
        'matrix-number' => 'required',
        'ic-number' => 'required',
        'faculty' => 'required',
        'programme' => 'required',
        'part' => 'required',
        'group' => 'required',
        'email' => 'required',
        'phone-number' => 'required'
      ]);

      $name = Helpers::raw($req->input('name'));
      $matrix_number = $req->input('matrix-number');
      $ic_number = $req->input('ic-number');
      $faculty = Helpers::raw($req->input('faculty'));
      $programme = $req->input('programme');
      $part = $req->input('part');
      $group = $req->input('group');
      $email = $req->input('email');
      $phone_number = $req->input('phone-number');

      User::create([
        'name' => $name,
        'matrix_number' => $matrix_number,
        'ic_number' => $ic_number,
        'faculty' => $faculty,
        'programme' => $programme,
        'part' => $part,
        'group' => $group,
        'email' => $email,
        'phone_number' => $phone_number,
        'password' => $ic_number
      ]);

      return redirect()->action('HomeController@login');
    }

    public function logout(Request $request) {
      auth()->logout();
      session()->flush();

      return redirect()->action('HomeController@index');
    }

    public function student_profile() {

      if (session('login?')) {
        $user = User::where('matrix_number', session('matrix_number'))->get();

        return view(
          'home.student_profile',
          compact('user')
        );
      }
      else {

        return redirect()->action('HomeController@login');
      }
    }

    public function student_profile_update(Request $req) {
      $req->validate([
        'name' => 'required',
        'matrix-number' => 'required',
        'ic-number' => 'required',
        'faculty' => 'required',
        'programme' => 'required',
        'part' => 'required',
        'group' => 'required',
        'email' => 'required',
        'phone-number' => 'required'
      ]);

      $name = Helpers::raw($req->input('name'));
      $matrix_number = $req->input('matrix-number');
      $ic_number = $req->input('ic-number');
      $faculty = Helpers::raw($req->input('faculty'));
      $programme = $req->input('programme');
      $part = $req->input('part');
      $group = $req->input('group');
      $email = $req->input('email');
      $phone_number = $req->input('phone-number');

      $update = [
        'name' => $name,
        'matrix_number' => $matrix_number,
        'ic_number' => $ic_number,
        'faculty' => $faculty,
        'programme' => $programme,
        'part' => $part,
        'group' => $group,
        'email' => $email,
        'phone_number' => $phone_number
      ];

      User::where('matrix_number', session('matrix_number'))->update($update);

      return redirect()->back()->with(['success' => 'You have successfully updated your profile information.']);
    }

    public function student_password_update(Request $req) {
      $req->validate([
        'new-password' => 'required'
      ]);

      $new_password = $req->input('new-password');

      $update = [
        'password' => $new_password
      ];

      User::where('matrix_number', session('matrix_number'))->update($update);

      return redirect()->back()->with(['success' => 'You have successfully change your password.']);
    }
}
