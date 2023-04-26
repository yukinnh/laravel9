<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/subjects/{{ $subject->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="subject">
                <h2>Subject</h2>
                
                <select name="subject[admin_subject_id]">
                    @foreach($admin_subjects as $admin_subject)
                        <option value="{{ $admin_subject->id }}" {{ $admin_subject->name === $subject->adminSubject->name ? 'selected' : '' }}>{{ $admin_subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='content_block'>
                @foreach($admin_texthooks as $admin_texthook)
                    <label for="textbook_checkbox_{{ $admin_texthook->id }}">
                        <input type="checkbox" name="textbook[]" value="{{ $admin_texthook->id }}" id="textbook_checkbox_{{ $admin_texthook->id }}"
                            {{ $subject->adminTextbooks->where('id', '=', $admin_texthook->id)->first() !== null  ? 'checked' : ''}}
                        />
                        {{ $admin_texthook->name }} 
                    </label>
                @endforeach
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>