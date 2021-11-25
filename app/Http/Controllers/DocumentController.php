<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $documents = DB::table('documents')->get();
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
                $fileName = $time . '-' . $files->extension();
                $files->move(public_path('uploads'), $fileName);
        else:
            return redirect()->back()->with('error', 'Seleccione documento');
        endif;

        DB::table('documents')->insert(array('id_user' => $request->id_user,'url_file' => $fileName));
        return redirect()->back()->with('message', 'Se ha subido el documento exitosamente');
    }

}
