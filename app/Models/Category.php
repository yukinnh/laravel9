<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        \Log::debug($this->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count));
         return $this->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
