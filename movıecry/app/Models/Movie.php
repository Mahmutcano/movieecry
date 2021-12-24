<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title','year','director_id','description','plot','poster'];

    public function director(){
        return $this->belongsTo(Director::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
}
