<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Assignment;

class AssignmentController extends Controller
{
    public function store_file(Request $req, $class_name) {
      $req->validate([
        'upload-file' => 'mimes:pdf,docx,xml,pptx,xls,xlsx,txt,csv|max:50000'
      ]);
      $storage = Storage::disk('local');
      $upload_file = $req->file('upload-file');
      if ($upload_file->isValid()) {
        // Files details
        $title =  $upload_file->getClientOriginalName();
        $file_name = str_replace(" ", "-", strtolower($title));
        $file_directory = 'pdf_files/assignment/'.$class_name.'/'.$file_name;

        // Save file manually (custom file name)
        $storage->putFileAs('assignment/'.$class_name.'/', new File($upload_file), $file_name, 'public');

        // Save data inside Assignment table
        Assignment::create([
          'class' => $class_name,
          'title' => $title,
          'class_directory' => $file_directory
        ]);

        return redirect()->back()->with(['success' => 'You have successfully uploaded a new file inside '.$class_name.' class!']);
      }
      else {
        return redirect()->back()->withErrors('The file is corrupted');
      }
    }
}
