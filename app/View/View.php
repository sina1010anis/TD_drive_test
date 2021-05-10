<?php


namespace App\View;
class View
{
    public function handle()
    {
        \Illuminate\Support\Facades\View::composer(['*'] , files::class);
        \Illuminate\Support\Facades\View::composer(['*'] , folder::class);
        \Illuminate\Support\Facades\View::composer(['*'] , file_in_folder::class);
    }
}
