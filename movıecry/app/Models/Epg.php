<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epg extends Model
{
    use HasFactory;
        protected $table = 'epgs';
        protected $fillable = ['id', 'ename', 'elink', 'start_time', 'end_time','eimg','timezone', 'user_id'];
}