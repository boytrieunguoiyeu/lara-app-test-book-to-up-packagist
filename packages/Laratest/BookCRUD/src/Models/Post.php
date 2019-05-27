<?php

namespace Laratest\PostCRUD\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author'];
}
