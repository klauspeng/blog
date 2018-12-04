<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['filename', 'storename', 'width', 'height', 'size', 'path', 'hash', 'url', 'delete'];
}
