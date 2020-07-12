<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Misc;
use App\Admin;
use App\Http\Controllers\MemberController;

class SearchController extends Controller
{
  public function search(Request $request){
    //dd($request->search_query);
    $show = session('show',25);
    $miscs = Misc::where('membership_no','like','%'.$request->search_query.'%')->paginate($show);
    $pages = $miscs;
    $members = $this->getMembersFromMiscs($miscs);
    return $this->displayResults($members,$show,$pages);
  }

  public function getMembersFromMiscs($miscs){
    $members = collect([]);
    foreach($miscs as $misc)
      $members = $members->concat([$misc->member]);
    return $members;
  }

  public function displayResults($members,$show,$pages){
    $processedBy = Admin::select('id','name','surname')->get()->keyBy('id')->toArray();
    $listName = 'Search Results';
    $listNum = 0;//this value is not used and must be set to anything less than 1
    $allStatus = MemberController::status();
    array_pop($allStatus);//remove the last item which is "Deleted"
    return view('dashboard.members',compact('members','processedBy','listName','listNum','allStatus','show','pages'));
  }
}
