<?php

namespace Laratest\PostCRUD\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author'];
}
