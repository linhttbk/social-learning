<?php

namespace App\Http\Controllers;
use App\Models\Document;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DocumentController extends Controller
{
    public function showAllDocuments()
    {
        $document = DB::table('document')->get();
        $totalDocument = $document->count();
        $totalRead = 0;
        foreach ($document as $data) {
            if ($data->status == 1) {
                $totalActive++;
            }
        }

        $document_pagination =  DB::table('document')->join('subject', 'document.id_subject', '=', 'subject.id')->select('document.*','subject.title')->paginate(10);
        return view('admin.document', compact('totalDocument', 'totalRead', 'document_pagination'));
    }
    public function searchDocument(Request $req){
        $document = DB::table('document')->get();
        $totalDocument = $document->count();
        $totalRead = 0;
        foreach ($document as $data) {
            if ($data->status == 1) {
                $totalRead++;
            }
        }
        $key_search = $req->input('key-search');
        $document_pagination = DB::table('document')->join('subject', 'document.id_subject', '=', 'subject.id')
            ->where([['document.des', 'like', '%' . $key_search . '%'],['subject.title', 'like', '%' . $req->subject_hide_select . '%']])
            ->paginate(10);
        return view('admin.document', compact('totalDocument', 'totalRead','document_pagination','key_search'));
    }
    public function getEditDocument($id)
    {
        $document = Document::find($id);
        $subject_reg = DB::table('subject')->where('id','=',''.$document->id_subject.'')->get();
        $allSubject= DB::table('subject')->get();
        return view('admin.edit-document', ['document' => $document, 'subject_reg' => $subject_reg[0]->title,'allSubject'=>$allSubject,
            'action' => 0]);
    }
    public function postEditDocument($id, Request $req){
        $document= Document::find($id);
        $subject= DB::table('subject')->where('subject.title','=',''.$req->subject_reg.'')->get();
        $document->des= $req->document_des;
        $document->url=$req->document_link;
        $document->id_subject=$subject[0]->id;
        $document->save();
        return redirect('admin-cp/document_management')->with('error', 'Cập nhật thành công');
    }
    public function deleteDocument($id){
        $doc = Document::find($id);
        if (!$doc) return redirect('admin-cp/document_management')->with('error', 'Không tồn tại tài liệu tham khảo');
        $doc->delete();
        return redirect('admin-cp/document_management')->with('error', 'Xóa tài liệu tham khảo thành công');
    }
    public function getAddDocument(){
        $allSubject= DB::table('subject')->get();
        return view('admin.add-document', ['allSubject'=>$allSubject,
            'action' => 0]);
    }
    public function postAddDocument(Request $req){
        $document = new Document();
        $presentDocument = DB::table('document')->get();
        $subject= DB::table('subject')->where('subject.title','=',''.$req->subject_reg.'')->get();
        $document->id =  $presentDocument->count();
        $document->id_subject=$subject[0]->id;
        $document->url= $req->document_link;
        $document->des= $req->document_des;
        $document->Auth::guard('admin')->user()->uid;
        $document->status=0;
        $document->save();
    }
}
