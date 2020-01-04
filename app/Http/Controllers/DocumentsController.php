<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Document;

class DocumentsController extends Controller
{
  public function storeFile(Request $request)
    {
      $this->validate($request,[
              'document' => 'required',
              'documentType'=>'required'
              ]);

      $member = Member::find(auth()->user()->id);
      //dd(count($member->document));
      if(count($member->document) <= 15){
        //member only allowed to store maximum 15 files, else do not store
        if(request()->hasFile(request()->file)){
          if(request()->file('document')->isvalid()){
            $fileExtension = request()->document->getClientOriginalExtension();
            $document = $member->document()->create();//create an entry in the database
            switch (request()->documentType) {
              case 'application':
                $documentType = "application";
                $fileNameToStore = "";
                break;
              case 'idpassport':
                $documentType = "idpassport";
                $fileNameToStore = "";
                break;
              case 'proofop':
                $documentType = "proofop";
                $fileNameToStore = "";
                break;
              case 'supportingdoc':
                $documentType = "supportingdoc";
                $fileNameToStore = "";
                break;
              default:
                $documentType = "illegalfile";
                $fileNameToStore = "illegalfile";
                break;
            }

            $fileNameToStore = $member->id."D".$document->id.$documentType.".".$fileExtension;
            $path = "documents";
            $document->type = $documentType;
            $document->path = $path."/".$fileNameToStore;
            $document->save();

            request()->document->storeAs($path,$fileNameToStore);
            
            return redirect('profile')->withErrors(['success','File upload successful']);
          }else{
            return redirect('profile')->withErrors(['Something went wrong!']);
          }//end if file->isValid
        }else{
          return redirect('profile')->withErrors(['Something went wrong!']);
        }//end if hasFile
      }else{
        return redirect('profile')->withErrors(['Maximum number of files reached.']);
      }//end if count() <= 15
    }
}
