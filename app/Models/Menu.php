<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function submenus()
    {
        return $this->belongsTo(Menu::class, 'menus_id');
    }

    public function menusFilhos()
    {
        return $this->hasMany(Menu::class, 'menus_id', 'id');
    }

    public static function limparURL($url){
        $url = strtolower($url);
        $url = str_replace(" ", "-", $url);
        return $url;
    }
}
