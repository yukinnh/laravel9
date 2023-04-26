<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">
            {{ $subject->adminSubject->name }}
        </h1>
        <div class="content">
            <form action="/textbooks" method="POST">
                @csrf
                <table border="1">
                <thead>
                    <tr>
                        <th>教材</th>
                        <th>開始時刻</th>
                        <th>終了時刻</th>
                        <th>コメント</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($textbooks as $textbook)
                        <tr>
                            <td>{{ !empty($textbook->name) ? $textbook->name : '' }}</td>
                            <td><input type="date" name="textbook[{{ $textbook->id }}][start_date]" value="{{ !empty($textbook->textbook->start_date) ? $textbook->textbook->start_date : '' }}"></td>
                            <td><input type="date" name="textbook[{{ $textbook->id }}][end_date]" value="{{ !empty($textbook->textbook->end_date) ? $textbook->textbook->end_date : '' }}"></td>
                            <td><textarea type="textarea" name="textbook[{{ $textbook->id }}][comment]" value="{{ !empty($textbook->textbook->comment) ? $textbook->textbook->comment : '' }}">{{ !empty($textbook->textbook->comment) ? $textbook->textbook->comment : '' }}</textarea></td>
                            <input type="hidden" name="textbook[{{ $textbook->id }}][admin_textbook_id]" value="{{ $textbook->id  }}">
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <input type="hidden" name="subject[id]" value="{{ $subject->id }}">
                <input type="hidden" name="subject[user_id]" value="1">
                <input type="submit" value="教材更新">
            </form>
        </div>
        <p class="edit">[<a href="/subjects/{{ $subject->id }}/edit">edit</a>]</p>
        <div class="footer">
            <a href="/subjects/index">戻る</a>
        </div>
    </body>
</html>