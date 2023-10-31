<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menus_id');
    }

    public static function retornaTamanho($valor){
        switch($valor){
            case 1:
                return 'Pequena';
            break;
            case 2:
                return 'Média';
            break;
            case 3:
                return 'Grande';
            break;

        }
    }
}
