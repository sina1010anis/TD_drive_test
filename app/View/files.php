<?php


namespace App\View;


use App\Models\FileUser;

class files
{
    public function compose(\Illuminate\View\View $view)
    {
        if (auth()->check()) {
            return $view->with('files', FileUser::whereUser_id(auth()->user()->id)->orderBy('id', 'desc')->get());
        }
    }
}
