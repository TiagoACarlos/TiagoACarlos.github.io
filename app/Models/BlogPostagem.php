<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostagem extends Model
{
    use HasFactory;
    protected $table = "blogs_postagens";

    public function categoria()
    {
        return $this->belongsTo(BlogCategoria::class, 'blogs_categorias_id');
    }

}
