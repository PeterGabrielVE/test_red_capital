<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\Document;
use Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if( Auth::user()->hasRole('user')){
            $documents = DB::table('documents')->leftjoin('users','documents.id_user','users.id')
            ->select('documents.*','users.name as name')->where('documents.id_user', Auth::user()->id)->get();
        }else{
            $documents = DB::table('documents')->leftjoin('users','documents.id_user','users.id')
            ->select('documents.*','users.name as name')->get();
        }
        $users = DB::table('users')->pluck('name','id');
        $menus = Menu::all();
        $submenus = DB::table('submenus')->select('name','id','id_menu')->get();
        return view('pages.documents.index', ['documents' => $documents,'menus' => $menus,'submenus' => $submenus,'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required|mimes:pdf,xlx,csv,jpg,png,txt,ppt|max:2048',
        ]);
        $arr = [];
        $files = $request->file('files');
        if($request->hasFile('files')) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $fileName = $time . '.' . $files->extension();
                $files->move(public_path('uploads'), $fileName);
        else:
            return redirect()->back()->with('error', 'Seleccione documento');
        endif;

        DB::table('documents')->insert(array('id_user' => $request->id_user,'url_file' => $fileName,'created_at' => $var));
        return redirect()->back()->with('message', 'Se ha subido el documento exitosamente');
    }

    public function download($fileId){  
        $entry = Document::where('id',$fileId)->firstOrFail();
        $pathToFile=public_path('uploads').'/'.$entry->url_file;
        return response()->download($pathToFile);           
    }

    public function destroy($id)
    {
        dd($id);
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('message', 'Se ha eliminado el documento');
    }

    public function show($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('message', 'Se ha eliminado el documento');
    }

}
