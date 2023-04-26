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
        'category_id',
        'image',
    ];
    
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // 多対多のリレーションを定義
    public function blocks()
    {
        return $this->belongsToMany('App\Models\Block');
    }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
