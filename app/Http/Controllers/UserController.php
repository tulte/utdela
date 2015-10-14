<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\UserGroup;
use App\UserFile;
use App\Events\UserCreated;
use Event;
use Crypt;

class UserController extends Controller {

    public function index() {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function edit($id) {
        $user = User::find($id);
        $groups = UserGroup::getListIdName();
        if($user) {
            return view('user.edit', ['user' => $user,'groups' => $groups]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null, $password_required = true)
    {
        $validator = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:user' . ($id > 0 ? ',email,' . $id : ''),
            'password' => ($password_required ? 'required|confirmed|min:6' : ''),
            'group'     => 'required|numeric'
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        $groups = UserGroup::getListIdName();
        return view('user.edit', ['groups' => $groups]);
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $user = new User();
        $this->saveUser($user,$request);

        Event::fire(new UserCreated($request));
        return redirect()->route('user.index');

    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id, $password_required);

        if($user === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Benutzer existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveUser($user,$request);
        return redirect()->route('user.index');

    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }

    public function files($id) {
        $files = UserFile::getFilesForUser($id);
        return view('user.files',array('files' => $files));
    }

    private function saveUser($user, $request) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->group_id = $request->group;
        if($request->password) {
            $user->password =  bcrypt($request->password);
        }
        $user->save();
    }

    public function download($id) {
        $tmpfile = null;
        try
        {
            $userfile = UserFile::find($id);
            if(!is_null($userfile)) {
                $path = config('upload.destination') . '/' . $userfile->user_id;
                $file = $path . '/' . $userfile->file;
                if(file_exists($file)) {
                    //create temp file and delete them after download
                    $tmpfile = $this->createTmpDownload($path,$file);
                    $response = response()->download($tmpfile, $userfile->name);
                    return $response;
                }
            }
            return redirect()->back();
        } catch (Exception $ex) {
            $this->deleteTmpFile($tmpfile);
            Log::error($ex->getMessage());
        }
    }

    private function createTmpDownload($path, $file) {
        $tmpfname = tempnam($path, "tmp");
        file_put_contents($tmpfname, Crypt::decrypt(file_get_contents($file)));
        return $tmpfname;
    }

    private function deleteTmpFile($tmpfile) {
        if(!is_null($tmpfile)) {
                @unlink($tmpfile);
        }
    }
}
