<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Subject Name</h1>
        <form action="/subjects" method="POST">
            @csrf
            <div class="subject">
                <h2>Subject</h2>
                <select name="subject[admin_subject_id]">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="textbook">
                <h2>textbook</h2>
                @foreach($textbooks as $textbook)
                    <input type="checkbox" name="textbook[]" value="{{ $textbook->id }}" id="textbook_checkbox_{{ $textbook->id }}" />
                    <label for="textbook_checkbox_{{ $textbook->id }}"> {{ $textbook->name }} </label>
                @endforeach
                
            </div>
            <input type="hidden" name="subject[user_id]" value="2">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>