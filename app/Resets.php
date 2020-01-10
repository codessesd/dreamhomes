<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resets extends Model
{
    protected $table = "password_resets";
    protected $guarded = [];
    public $timestamps = false;
}
