<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misc extends Model
{
  protected $guarded = [];
  
  public function member()
  {
    return $this->belongsTo(Member::class);
    
    /*withDefault([
      'member_certified_id'=>'No',
      'pop'=>'',
      'join_fee'=>'',
      'date_payment'=>'',
      'position'=>'',
      'beneficiary'=>'',
      'beneficiary_id'=>'',
      'nok'=>'',
      'nok_id'=>'',
      'life_cover'=>'',
      'agreement'=>'',
      'status'=>'incomplete',
      'date_received'=>'',
      'date_processed'=>'',
      'processed_by'=>'',
      'created_at'=>'',
      'updated_at'=>'',
    ]);*/
  }
}
