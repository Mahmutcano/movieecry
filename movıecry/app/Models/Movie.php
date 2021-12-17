<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

        protected $table = 'movies';
        protected $fillable = ['mtitle', 'mtime', 'mname', 'mvideo', 'mimg', 'mcategory', 'mold', 'altimg', 'myear', 'mseason', 'alttitle', 'altdesc', 'user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
