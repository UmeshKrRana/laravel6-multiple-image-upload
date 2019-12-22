<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function index() {
        return view('upload');
    }


    // ------------------ [ Upload image ] --------------

    public function uploadImages(Request $request) {

        $imageArray     =       array();

      // file validation
        $this->validate($request, [
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if validation success
        $uploadedImages       =       array();

        if($files     =       $request->file('images')) {

            foreach($files as $file) {

                $name     =    time().rand(111,999).'.'.$file->getClientOriginalExtension();

                $destinationPath = public_path('/uploads');

                if($file->move($destinationPath, $name)) {

                    $images[]   =   $name;

                    $uploadedImages[]       =       array(
                        "images"       =>      $name
                    );

                    $saveResult   =     ImageUpload::create(['image_name' => $name]);
                }
            }
            return redirect()->back()->with(compact('uploadedImages'));

        }
    }
}
