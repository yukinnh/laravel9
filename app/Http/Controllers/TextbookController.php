<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminTextbook;
use App\Models\Textbook;

class TextbookController extends Controller
{
    
    // 更新 or 登録
    public function updateInsert(Request $request, Textbook $textbook)
    {
        $input_subject = $request['subject'];
        $input_text_book = $request['textbook'];
        
        foreach($input_text_book as $v)
        {
            $textbook->updateOrCreate(
                [
                    'user_id' => $input_subject['user_id'],
                    'subject_id' => $input_subject['id'],
                    'admin_textbook_id' => $v['admin_textbook_id'],
                ],
                [
                    'user_id' => $input_subject['user_id'],
                    'subject_id' => $input_subject['id'],
                    'admin_textbook_id' => $v['admin_textbook_id'],
                    'start_date' => $v['start_date'],
                    'end_date' => $v['end_date'],
                    'comment' => $v['comment'],
                ],
                
            );
        }
        
        return redirect('/subjects/' . $input_subject['id']);
    }
}
