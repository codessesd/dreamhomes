<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  public function member(){
    return $this->belongsTo(Member::class);
  }
}
