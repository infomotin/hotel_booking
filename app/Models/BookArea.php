<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookArea extends Model
{
    protected $table = 'book_areas';

    protected $fillable = [
        'image',
        'short_title',
        'main_title',
        'short_description',
        'description',
        'link_url',
        'status',
        'created_by',
    ];
}
