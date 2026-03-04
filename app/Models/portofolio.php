<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class portofolio extends Model
{
   protected $fillable = [
    'title',
    'description',
    'image',
    'link'
   ];
}
