<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //public $timestamps = false;// это свойство нужно фолсить, если время создания и апдейта не нужно.
    use HasFactory;
}
