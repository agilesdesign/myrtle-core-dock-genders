<?php

namespace Myrtle\Core\Genders\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;
}
