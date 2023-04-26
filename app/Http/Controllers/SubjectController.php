<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Textbook;
use App\Models\AdminSubject;
use App\Models\AdminTextbook;

class SubjectController extends Controller
{
     public function index(Subject $subject)//インポートしたAdminSubjectをインスタンス化して$postとして使用。
    {
        return view('subjects/index')->with(['subjects' => $subject->getPaginateByLimit()]);
    }
    
    public function show(Request $request, Subject $subject, Textbook $textbook)
    {
        $textbooks = $subject->adminTextbooks()->get();
        
        return view('subjects/show')
        ->with(
            [
                'subject' => $subject,
                'textbooks' => $textbooks
            ]);
    }
    
    public function create(AdminSubject $admin_subject, AdminTextbook $admin_textbook)
    {
        return view('subjects/create')
        ->with([
            'subjects' => $admin_subject->get(),
            'textbooks' => $admin_textbook->get()
        ]);
    }
    
    public function store(Request $request, Subject $subject)
    {
        $textbook_id = $request['textbook'];
        
        // 投稿保存
        $input = $request['subject'];
        $subject->fill($input)->save();
        
        // テキストブックのID 保存
        $subject->adminTextbooks()->attach($textbook_id);
        
        return redirect('/subjects/' . $subject->id);
    }
    
    public function edit(Subject $subject, AdminSubject $admin_subject, AdminTextbook $admin_textbook)
    {
        return view('subjects/edit')
        ->with([
            'subject' => $subject,
            'admin_subjects' => $admin_subject->get(),
            'admin_texthooks' => $admin_textbook->get(),
        ]);
    }
    
    public function update(Request $request, Subject $subject)
    {
        $textbook_id = $request['textbook'];
        
        // 投稿更新
        $input_subject = $request['subject'];
        $subject->fill($input_subject)->save();
        
        // 投稿に紐づくテキストブックを削除
        $subject->adminTextbooks()->detach();
        
        // テキストブックのID 更新
        $subject->adminTextbooks()->attach($textbook_id);
    
        return redirect('/subjects/' . $subject->id);
    }
    
    public function delete(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects/index');
    }
}
