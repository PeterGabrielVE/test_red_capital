<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Submenu;

class Menu extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function submenu()
    {
        return Submenu::where('id_menu',$this->id)->count();
    }
}
