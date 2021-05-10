<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_in_folder extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function folder_users()
    {
        return $this->belongsTo(folder_user::class , 'folder_id' , 'id');
    }
}
