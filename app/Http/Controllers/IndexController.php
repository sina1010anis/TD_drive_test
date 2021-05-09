<?php

namespace App\Http\Controllers;

use App\Models\FileUser;
use App\Models\folder_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class IndexController extends Controller
{
    public function logout()
    {
        auth()->logout();
    }
    public function newFile(Request $request , FileUser $fileUser)
    {
        if (!$request->file('img') == ''){
            $tmp=$request->file('img');
            $name_not=Hash::make(rand(0,100)).$tmp->getClientOriginalName();
            for ($i=0;$i<strlen($name_not);$i++){
                if ($name_not[$i] == '/'){
                    $name_not[$i] = '0';
                }
            }
            $name =$name_not;
            $tmp->move(public_path('/data/user/file/'.auth()->user()->name.'/'),$name);
            $fileUser->user_id = auth()->user()->id;
            $fileUser->file = $name;
            $fileUser->type = $tmp->getClientMimeType();
            $fileUser->name = $tmp->getClientOriginalName();
            $fileUser->save();
            return redirect()->back()->with('msg_suc' , 'Upload successfully');
        }
    }

    public function newFolder(Request $request , folder_user $folder_user)
    {
        if ($request->ajax()){
            $folder_user->name = $request->name;
            $folder_user->user_id = auth()->user()->id;
            $folder_user->save();
            $folder_user->save();
            return redirect()->back()->with('msg_suc' , 'Create Folder '.$request->name);
        }
    }
}
