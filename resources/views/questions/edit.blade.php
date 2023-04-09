<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>create</title>
    </head>
    <body>
        <h1>投稿作成</h1>
        <form action="/questions" method="POST">
            @csrf
            <div>
                <h2>タイトル</h2>
                <input type="text" name="question[title]" placeholder="タイトル" value="{{ $question->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
            </div>
            <div>
                <h2>本文</h2>
                <textarea name="question[body]">{{ $question->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
            </div>
            <div>
                <h2>カテゴリー</h2>
                <select multiple name="question[tags][]">
                 @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if ($question->tags->contains($tag)) selected @endif>{{ $tag->name }}</option>
                 @endforeach
                </select>
            </div>
            <div>
                <h2>画像</h2>
                <image src="{{ $question->image }}" width="200" height="200">
                <input type="file" name=image>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div><a href={{ route('questions.my_questions') }}>戻る</a></div>
    </body>
</html>
