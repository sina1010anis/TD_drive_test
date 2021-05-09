<?php


namespace App\View;


use App\Models\folder_user;

class folder
{
    public function compose(\Illuminate\View\View $view)
    {
        if (auth()->check()) {
            return $view->with('folders', folder_user::orderBy('id' , 'desc')->whereUser_id(auth()->user()->id)->get());
        }
    }
}
