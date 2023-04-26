<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminSubject;

class AdminSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminSubject::create([
            'id' => 1,
            'name' => '国語'
        ]);
        
        AdminSubject::create([
            'id' => 2,
            'name' => '数学'
        ]);
        
        AdminSubject::create([
            'id' => 3,
            'name' => '英語'
        ]);
    }
}
