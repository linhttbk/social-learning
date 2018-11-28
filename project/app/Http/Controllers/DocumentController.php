<?php

namespace App\Http\Controllers;
use App\Models\Document;
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

        $document_pagination =  DB::table('document')->paginate(10);
        return view('admin.document', compact('totalDocument', 'totalRead', 'document_pagination'));
    }
    public function searchDocument(){
        $document = DB::table('document')->get();
        $totalDocument = $user->count();
        $totalRead = 0;
        foreach ($document as $data) {
            if ($data->status == 1) {
                $totalRead++;
            }
        }
        $key_search = $request->input('key-search');
        $user_pagination = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')
            ->where('User.uid', 'like', '%' . $key_search . '%')
            ->orWhere('name', 'like', '%' . $key_search . '%')
            ->orWhere('email', 'like', '%' . $key_search . '%')
            ->paginate(10);
        return view('admin.member', compact('totalUser', 'totalActive', 'user_pagination', 'key_search'));
    }

}
