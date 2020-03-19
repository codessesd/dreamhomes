<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAddress extends Model
{
    public function member()
    {
      return $this->belongTo(Member::class)
      ->withDefault([
        'post_line1' => '',
        'post_code' => '',
      ]);
    }
}
