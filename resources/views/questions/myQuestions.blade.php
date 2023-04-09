<x-app-layout>
    <x-slot name="header">
        　一覧
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
     <style type="text/css">
     h1.newcreate{
          color:#ff6347;
          font-size:30px;
          background-color:#f0f8ff;
          border-radius:10px;
          display: inline-block;
      }
      h1.question{
          color:#ff6347;
          font-size:50px;
          text-align: center;
          border: 1rem solid;
      }
      h2{
           font-weight:bold;
           font-size:20px;
      }
      </style>
</head>
<body>
    <h1 class="newcreate"><a href="/questions/create">新規作成</a></h1>
    <h1 class="question">Questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li>
                <h1
                    class="text-2xl font-bold text-blue-600 py-5 m-20"
                ><a href="{{ route('questions.show', $question->id) }}">
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

                {{-- create edit button --}}
                <div>
                    <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    onclick="window.location.href='{{route('questions.edit', ['question' => $question->id])}}'"
                    >編集</button>
                </div>
                {{-- create delete button --}}
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input 
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        type="submit" 
                        value="削除">
                </form>
            </li>
        @endforeach
    </ul>
</body>
</x-app-layout>