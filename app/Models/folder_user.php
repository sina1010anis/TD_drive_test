<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folder_user extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function folder_users()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
