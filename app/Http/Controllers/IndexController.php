<?php

namespace App\Http\Controllers;

use App\Models\FileUser;
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
            $name = Hash::make(rand(0,100)).$tmp->getClientOriginalName();
            $tmp->move(public_path('/data/user/file/'.auth()->user()->name.'/'),$name);
            $fileUser->user_id = auth()->user()->id;
            $fileUser->file = $name;
            $fileUser->type = $tmp->getClientMimeType();
            $fileUser->save();
            return redirect()->back()->with('msg_suc' , 'Upload successfully');
        }
    }
}
