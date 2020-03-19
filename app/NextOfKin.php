<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
  protected $guarded = [];
  public function member()
  {
    return $this->belongsTo(Member::class)
      ->withDefault([
        'id' => '',
        'member_id' => '',
        'title' => '',
        'initials' => '',
        'name' => '',
        'surname' => '',
        'relationship' => '',
        'contact_no'=>'',
        'email'=>'',
        'postal_address'=>'',
        'postal_code'=>'',
        'address_line_1'=>'',
        'surbub'=>'',
        'city'=>'',
        'area_code'=>'',
      ]);
  }
}
