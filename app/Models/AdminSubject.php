<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSubject extends Model
{
    use HasFactory;
    
    //「1対多」の関係なので単数系に
    public function subjects()
    {
        return $this->Hasmany(Subject::class);
    }
}
