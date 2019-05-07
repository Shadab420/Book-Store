<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [

    	'coverImg', 'title', 'description'
   	];

   	public function Author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function Category()
    {
    	return $this->belongsTo(Category::class, 'cat_id');
    }

    public function Publication()
    {
    	return $this->belongsTo(Publication::class, 'pub_id');
    }

}
