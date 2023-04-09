<x-app-layout>
    <x-slot name="header">
        　一覧
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
    <h1><a href="/questions/create">新規作成</a></h1>
    <h1>Questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li>
                <h1><a href="{{ route('questions.show', $question->id) }}">
                    {{ $question->title }}
                </a></h1>
                <h2>Tags</h2>
                <ul>
                    @foreach ($question->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
                <h2>Body</h2>
                <p>{{ $question->body }}</p>
                <h2>Answers</h2>
                <ul>
                    @foreach ($question->answers as $answer)
                        <li>{{ $answer->body }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</x-app-layout>