<!DOCTYPE html> 
<x-app-layout>
    <x-slot name="header">
        　一覧
    </x-slot>
    <html>
<head>
    <title>
        Question {{$question->id}}
    </title>
</head>
<script>
    function toggleForm() {
      var form = document.getElementById("myAnswer");
      form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>
<body>
    <h1 class="text-2xl font-bold py-5">{{ $question->title }}</h1>
    <h2 class="text-xl font-bold py-1">Tags</h2>
    <ul>
        @foreach ($question->tags as $tag)
            <li class="text-xm py-0">・{{ $tag->name }}</li>
        @endforeach
    </ul>
    <h2 class="text-xl font-bold py-1">Body</h2>
    <p>{{ $question->body }}</p>
    
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-5 py-2 px-4 rounded"
        onclick="toggleForm()"
    >回答する</button>
    
    <form id="myAnswer" style="display: none;"
        method="POST"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        action="/questions/{{$question->id}}/reply"
    >
        @csrf
        <label for="body">内容:</label>
        <input type="text" name="body" />
        <br />
        <h2>画像</h2>
        <input type="file" name=image value={{old('question.image')}}>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            type="submit"
        >回答を送信</button>
    </form>
    
    {{-- insert horizontal bar --}}
    <hr class="border-2 border-gray-300">

    <h2 class="text-2xl">Answers</h2>
    <ul class="list-disc">
        @foreach ($question->answers as $answer)
            @if ($answer->answer_id == null)
                <li>{{ $answer->body }}</li>
                @if($answer->image)
                <img src="{{asset('./upload/'.$answer->image)}}" width="100">
                @endif
                @php
                    $answers = $answer->children;
                    $indent = 0;
                @endphp
                {{-- while answers children exists, nest them --}}
                @while ($answers->count() > 0)
                    @php
                        echo('<script>console.log('.$answers.');</script>')
                    @endphp
                    <ul class="ml-5">
                        @foreach ($answers as $answer)
                        <li>
                            {{-- indent --}}
                            @for ($i = 0; $i < $indent; $i++)
                                <span class="ml-5"></span>
                            @endfor
                            {{ $answer->body }}
                        </li>
                        @endforeach
                    </ul>
                    @php
                        $answers = $answer->children;
                        $indent++;
                    @endphp
                @endwhile
            @endif
            {{-- <ul>
            @foreach ($answer->children as $child)
                <li>{{$child->body}}</li>
            @endforeach
            </ul> --}}
        @endforeach
    </ul>
</body>
</x-app-layout>