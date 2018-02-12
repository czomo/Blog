<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artyk extends Model
{
    //Nazwa
    protected $artyk= 'posts';
    //Czas
    public $timestamp =true;
    //PK
    public $primaryKey= 'id';
}
