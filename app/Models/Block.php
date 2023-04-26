<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    
    // 多対多のリレーションを定義
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
