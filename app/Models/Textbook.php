<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'subject_id',
        'admin_textbook_id',
        'start_date',
        'end_date',
        'comment',
    ];
    
    // protected $primaryKey = [
    //     'user_id', 
    //     'subject_id',
    //     'admin_textbook_id'
    // ];
    
    public function adminTextbook()
    {
        return $this->belongsTo(AdminTextbook::class);
    }
    
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }
}
