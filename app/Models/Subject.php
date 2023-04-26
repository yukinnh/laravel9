<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'admin_subject_id',
    ];
    
    //「1対多」の関係なので単数系に
    public function adminSubject()
    {
        return $this->belongsTo(AdminSubject::class);
    }
    
    // 多対多のリレーションを定義
    public function adminTextbooks()
    {
        return $this->belongsToMany(AdminTextbook::class);
    }
    
    // 1対多
    public function textbooks()
    {
        return $this->Hasmany(Textbook::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
}
