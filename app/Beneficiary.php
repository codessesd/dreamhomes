<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
  protected $guarded = [];
  public function member()
  {
    return $this->belongsTo(Member::class)
    ->withDefault([
      'name'=>'',
      'surname'=>'',
      'relationship'=>'',
      'id_number'=>'',
    ]);
  }
}
