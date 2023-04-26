<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/'>posts</a>
        <form action="/blocks/fromDate" method="GET">
            <input type="date" name="block[fromDate]" min="2021-10-10" />
            <input type="submit" value="検索"/>
        </form>
        <div class='blocks'>
            <table border="1">
                <tr>
                  <th>ブロック名称</th>
                </tr>
                @foreach ($blocks as $block)
                    <tr>
                        @if($block->search_flg)
                          <td style="background-color: #f00;">{{ $block->name }}</td>
                        @else
                          <td>{{ $block->name }}</td>
                        @endIf
                    </tr>
                @endforeach
             </table>
        </div>
    </body>
</html>