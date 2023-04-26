<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSubjecTextbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_textbooks')->insert([
            [
                'name' => '万葉集',
                'admin_subject_id' => 1
            ],
            [
                'name' => '源氏物語',
                'admin_subject_id' => 1
            ],
                        [
                'name' => '古事記',
                'admin_subject_id' => 1
            ],
            [
                'name' => '青チャート',
                'admin_subject_id' => 2
            ],
                [
                'name' => '白チャート',
                'admin_subject_id' => 2
            ],
            [
                'name' => '黄チャート',
                'admin_subject_id' => 2
            ],
            [
                'name' => 'NextStage',
                'admin_subject_id' => 3
            ],
            [
                'name' => 'フォレスト',
                'admin_subject_id' => 3
            ],
            [
                'name' => '英語マスターになれる！',
                'admin_subject_id' => 3
            ],
        ]);
    }
}
