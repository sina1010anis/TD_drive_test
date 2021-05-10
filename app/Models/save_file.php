<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save_file extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function file_users()
    {
        return $this->belongsTo(FileUser::class , 'file_id' , 'id');
    }
    public $timestamps = false;
}
