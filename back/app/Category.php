<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

    	'catName'
    ];

    public function Book()
    {
    	return $this->hasMany(Book::class);
    }
}
