<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
