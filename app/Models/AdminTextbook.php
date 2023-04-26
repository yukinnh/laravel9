<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTextbook extends Model
{
    use HasFactory;
    
    // 多対多のリレーションを定義
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    
    // 1対多
    public function textbooks()
    {
        return $this->hasMany(Textbook::class);
    }
    
    public function textbook()
    {
        return $this->hasOne(Textbook::class);
    }
    
    
}
