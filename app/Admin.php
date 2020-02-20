<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Admin extends Model
{
    /*public function email($id)
    {
      $user = User::where('id',$id)->get();
      return $user->email;
    }*/
    protected $guarded = [];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}

