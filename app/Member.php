<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $guarded = [];

  public function document(){
    return $this->hasMany(Document::class);
  }
}
