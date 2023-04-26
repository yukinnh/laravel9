<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ secure_asset('js/deletePost.js') }}"></script>
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/subjects/create'>create</a>
        <a href='/blocks/index'>blocks</a>
        <a href='/subjects/index'>subjects</a>
        <p></p>
        <div class='subjects'>
            @foreach ($subjects as $subject)
                <div class='subject'>
                    <a href='/subjects/{{ $subject->id }}'>{{ $subject->adminSubject->name }}</a>
                    <p class='body'></p>
                    <form action="/subjects/{{ $subject->id }}" id="form_{{ $subject->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $subject->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $subjects->links() }}
        </div>
    </body>
</html>