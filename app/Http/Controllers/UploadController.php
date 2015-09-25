<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserFile;
use Input;

class UploadController extends Controller
{

    public function index(User $user) {
        return view('upload.index', array('users' => User::getListIdName()));
    }

    public function upload(User $user) {
        $file = Input::file('file');
        $user_id = Input::get('user');
        $user = User::find($user_id);

        $result = [];

        if(is_null($user)) {
            return redirect()->back()->withErrors(['error' => ['Benutzer existiert nicht']]);
        }

        if(!$this->checkExtension($file)) {
            return redirect()->back()->withErrors(['error' => ['Dateityp nicht erlaubt']]);
        }

        $destination = config('upload.destination') . '/' . $user_id;
        $this->makeDir($destination);

        $uploadResult = $file->move($destination);
        if($uploadResult) {
            $result = ['infos','Datei hochgeladen'];
            //create user file entry
            $userfile = new UserFile();
            $userfile->user_id = $user_id;
            $userfile->name = $file->getClientOriginalName();
            $userfile->file = $file->getFilename();
            $userfile->save();

        } else {
            $result = ['errors','Fehler beim hochladen'];
        }

        return redirect()->back()->with($result[0],$result[1]);
    }

    private function checkExtension($file) {
        if(!is_null($file)) {
            $extension = $file->getClientOriginalExtension();
            return in_array($extension,config('upload.extensions'));
        }
        return false;
    }

    private function makeDir($path)
    {
         return is_dir($path) || mkdir($path);
    }

}
