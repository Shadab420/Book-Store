<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [

    	'fullname', 'photo', 'aboutAuthor'
    ];

    public function Book()
    {
    	return $this->hasMany(Book::class);
    }
}
