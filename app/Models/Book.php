<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /*protected $table = 'books';
    public $primaryKey = 'id';
    public $timestamps = true;//false*/

    /*public function scopeActive($query){
    	return $query->where('active', 1);
    }*/

    public function scopeActive($query, $value){
    	return $query->where('active', $value);
    }

}
