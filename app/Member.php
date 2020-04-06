<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $guarded = [];

  public function document()
  {
    return $this->hasMany(Document::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function areas()
  {
    return $this->hasMany(Area::class);
  }

  public function beneficiaries()
  {
    return $this->hasMany(Beneficiary::class);
  }

  public function misc()
  {
    return $this->hasOne(Misc::class);
  }

  public function home_address()
  {
    return $this->hasOne(HomeAddress::class);
  }

  public function post_address()
  {
    return $this->hasOne(PostAddress::class);
  }

  public function next_of_kin()
  {
    return $this->hasOne(NextOfKin::class);
  }

  public function subscriptions()
  {
    return $this->belongsToMany(Subscription::class);
  }
}
