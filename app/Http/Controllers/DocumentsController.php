<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Document;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\applicationStatus;

class DocumentsController extends Controller
{
  public function storeFile(Request $request)
    {
      $this->validate($request,[
              'document' => 'required',
              'documentType'=>'required'
              ]);
      $member = Member::find(auth()->user()->id);
      $docTypes = DocumentsController::docTypes();

      if(count($member->document) <= 15){
        //member only allowed to upload maximum 15 files
        if(request()->hasFile(request()->file)){
          if(request()->file('document')->isvalid()){
            $fileExtension = request()->document->getClientOriginalExtension();
            $uploadedDocs = [];
            foreach($member->document->all() as $document)
              array_push($uploadedDocs, $document->type);
            
            switch (request()->documentType) {
              case $docTypes['ap']:
                if(in_array($docTypes['ap'],$uploadedDocs))
                  return redirect()->back()->withErrors(['Application form already uploaded!']);
                $documentType = $docTypes['ap'];
                break;
              case $docTypes['id']:
                $documentType = $docTypes['id'];
                if(in_array($docTypes['id'],$uploadedDocs))
                  return redirect()->back()->withErrors(['ID or Passport already uploaded!']);
                break;
              case $docTypes['pr']:
                if(in_array($docTypes['pr'],$uploadedDocs))
                  return redirect()->back()->withErrors(['Proof of Payment already uploaded!']);
                $documentType = $docTypes['pr'];
                break;
              case $docTypes['su']:
                $documentType = $docTypes['su'];
                break;
              default:
                return redirect()->back()->withErrors(['Something went wrong! Or You are being very naughty!']);
                $documentType = "illegalfile";
                $fileNameToStore = "illegalfile";
                break;
            }

            $document = $member->document()->create();//create a document entry in the documents table

            $fileNameToStore = $member->id."D".$document->id.$documentType.".".$fileExtension;
            $path = "documents";
            $document->type = $documentType;
            $document->original_name = $request->document->getClientOriginalName();
            $document->extension = $fileExtension;
            $document->path = "/".$path."/".$fileNameToStore;
            $document->save();
            request()->document->storeAs($path,$fileNameToStore);

            return redirect()->back()->withErrors(['success','File upload successful']);

          }else{return redirect('profile')->withErrors(['Something went wrong!#FU101']);}//end if file->isValid
        }else{return redirect('profile')->withErrors(['Something went wrong! #FU102']);}//end if hasFile
      }else{return redirect('profile')->withErrors(['Maximum number of files reached.']);}//end if count() <= 15
    }

    public function adminFileDownload($id)
    {
      $file = Document::find($id);
      if($file != null){
        if(Storage::exists($file->path)){
          return Storage::download($file->path);
        }else return redirect('profile')->withErrors('File not found. #FA101');
      }else return redirect('profile')->withErrors('File not found. #FA102');
    }

    public function adminFileDelete($id)
    {
      $file = Document::find($id);
      if($file != null){
        if(Storage::exists($file->path)){
          $member = Member::find($file->member_id);
          if($file->type == 'application'){
            $member->status = 'incomplete';
            $member->save();
          }
          $file->delete();//remove file from database
          Storage::delete($file->path);//delete file from disk
          return redirect()->back();
        }else return redirect('profile')->withErrors('File not found. #FA101');
      }else return redirect('profile')->withErrors('File not found. #FA102');
    }

    public function downloadOrDelete($action, $id)
    {
      $file = Document::find($id);
      if($file != null){
        if(Storage::exists($file->path)){
          if($file->member_id == auth()->user()->id){
            if ($action == 'download'){
              $downloadName = $this->readableName($file).".".$file->extension;
              return Storage::download($file->path,$downloadName);
            }
            elseif ($action == 'delete'){
              $member = Member::find(auth()->user()->id);
              if($member->misc->status !== 'incomplete')
                return redirect('/profile')->withErrors(['warning','Action not allowed','You have already submitted an application.']);
              $member = Member::find(auth()->user()->id);
              /*if($file->type == 'application'){
                $member->status = 'incomplete';
                $member->save();
              }*/
              $file->delete();
              Storage::delete($file->path);
              return redirect()->back();
            }else return redirect('profile')->withErrors('Unsupported action!');
          }else return redirect('profile')->withErrors('Access denied!');
        }else return redirect('profile')->withErrors('File not found. #FA101');
      }else return redirect('profile')->withErrors('File not found. #FA102');
    }

    public static function readableName($document)
    {
       switch ($document->type){
        case 'application':
          return "Application Form";
          break;
        case 'idpassport':
          return "Id Or Passport";
          break;
        case 'proofop':
          return "Proof Of Payment";
          break;
        case 'supportingdoc':
          return "Suporting Document";
          break;
        default:
          return "Invalid file type";
          break;
      }
    }

    public static function docTypes()
    {
      return [
        'ap' => 'application',
        'id' => 'idpassport',
        'pr' => 'proofop',
        'ne' => 'nextofkin',
        'be' => 'beneficiary',
        'su' => 'supportingdoc',
      ];
    }
} 
