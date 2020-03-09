<?php
/*
The following describes the powers of an Admin in this program
--------------------------------------------------------------
Admin level 0 : Normal User. No Admin access at all
Admin Level 1 : Access to admin dashboard
              : Can view all members
              : No edit priviledges

Admin Level 2 : Has all level 1 priviledges plus
              : Can edit all expect admin level 3 attributes

Admin Level 3 : Has all level 2 priviledges plus 
              : Can edit position, membership number, location, ID number
              : Can block/unblock users
               
Admin Level 4 : This is super admin and can do everything
              : In addition to to Level 3 Admin this admin can
              : Can delete members
              : Add or delete other admins
              : Level 4 admin can only be assigned by the programmer
*/
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

    public function permissions(){
      return $this->belongsToMany('App\Permission');
    }
}

