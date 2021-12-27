<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

        protected $table = 'channels';
        protected $fillable = ['ctitle','cdate' , 'ctime', 'cname', 'cimg', 'user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}