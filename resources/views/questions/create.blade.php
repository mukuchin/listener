<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>create</title>
        
    </head>
    <body>
        <h1>投稿作成</h1>
        <form enctype="multipart/form-data" action="/questions" method="POST">
            @csrf
            <div>
                <h2>タイトル</h2>
                <input type="text" name="question[title]" placeholder="タイトル" value="{{ old('question.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
            </div>
            <div>
                <h2>本文</h2>
                <textarea name="question[body]">{{ old('question.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
            </div>
            <div>
                <h2>カテゴリー</h2>
                <select multiple name="question[tags][]">
                 @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                 @endforeach
                </select>
            </div>
            <div>
                <h2>画像</h2>
                <input type="file" name=image>
            </div>
            <div>
                <span>匿名で投稿する</span>
                <input type="checkbox" name="question[is_anonymous]" value="1">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/questions">戻る</a></div>
    </body>
</html>
