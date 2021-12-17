<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epg extends Model
{
    use HasFactory;

    protected $table = 'epgs';
    protected $fillable = ['etitle', 'etime', 'ename', 'eimg', 'user_id'];

    public function User(){
        return $this->belongsTo(User::class);
}
}