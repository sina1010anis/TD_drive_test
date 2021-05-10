<?php

namespace App\Http\Controllers;

use App\Models\file_in_folder;
use App\Models\FileUser;
use App\Models\folder_user;
use App\Models\save_file;
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
            $count = folder_user::whereName($request->name)->count();
            if ($count == 0){
                $folder_user->name = $request->name;
                $folder_user->user_id = auth()->user()->id;
                $folder_user->save();
                $folder_user->save();
                return 'ok';
            }else {
                return 'err';
            }
        }
    }

    public function newFileInFolder(Request $request , file_in_folder $file_in_folder)
    {
        $tmp=$request->file('img');
        $name_not=Hash::make(rand(0,100)).$tmp->getClientOriginalName();
        for ($i=0;$i<strlen($name_not);$i++){
            if ($name_not[$i] == '/'){
                $name_not[$i] = '0';
            }
        }
        $name =$name_not;
        $tmp->move(public_path('/data/user/file/'.auth()->user()->name.'/'),$name);
        $file_in_folder->user_id = auth()->user()->id;
        $file_in_folder->folder_id = $request->folder_id;
        $file_in_folder->file = $name;
        $file_in_folder->name = $tmp->getClientOriginalName();
        $file_in_folder->save();
        return redirect()->back()->with('msg_suc' , 'Upload successfully');
    }
    public function saveFile(Request $request , save_file $save_file){
        $save_file->user_id = auth()->user()->id;
        $save_file->file_id =$request->id;
        $save_file->save();
        return 'Saved File To Item SaveFile';
    }

    public function deleteFile(Request $request)
    {
        $file = FileUser::find($request->id);
        FileUser::where(['user_id' => auth()->user()->id , 'id' => $request->id])->delete();
        $path=public_path('data\user\file'.'\\'.auth()->user()->name.'\\'.$file->file);
        unlink($path);
        return 'Delete File '.$file->name;

    }
}
