<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [

    	'pubName', 'address'
    ];

    public function Book()
    {
    	return $this->hasMany(Book::class);
    }
}
