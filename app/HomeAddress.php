<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeAddress extends Model
{
    public function member()
    {
      return $this->belongsTo(Member::class)
        ->withDefault([
          'addr_line1' => '',
          'addr_line2' => '',
          'surbub' => '',
          'city' => '',
          'area_code' => '',
          ]);
    }
}
