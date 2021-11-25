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
        $menus = Menu::all();
        $submenus = DB::table('submenus')->select('name','id','id_menu')->get();
        return view('pages.documents.index', ['documents' => $documents,'menus' => $menus,'submenus' => $submenus]);
    }

}
