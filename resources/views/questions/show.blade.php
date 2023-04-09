<!DOCTYPE html> 
<html>
<head>
    <title>Question {{$question->id}}</title>
</head>
<script>
    function toggleForm() {
      var form = document.getElementById("myAnswer");
      form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>
<body>
    <h1>{{ $question->title }}</h1>
    <h2>Tags</h2>
    <ul>
        @foreach ($question->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    <h2>Body</h2>
    <p>{{ $question->body }}</p>
    
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        onclick="toggleForm()"
    >回答する</button>
    <form id="myAnswer" style="display: none;"
        method="POST"
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
    
    <h2>Answers</h2>
    <ul>
        @foreach ($question->answers as $answer)
            @if ($answer->answer_id == null)
                <li>{{ $answer->body }}</li>
                @if($answer->image)
                <img src="{{asset('./upload/'.$answer->image)}}" width="100">
                @endif
                @php
                    $answers = $answer->children;
                @endphp
                {{-- while answers children exists, nest them --}}
                @while ($answers->count() > 0)
                    @php
                        echo('<script>console.log('.$answers.');</script>')
                    @endphp
                    <ul>
                        @foreach ($answers as $answer)
                        <li>{{ $answer->body }}</li>
                        {{-- @if ($answer->user_id == $user_id)
                        @endif --}}
                        @endforeach
                    </ul>
                    @php
                        $answers = $answer->children;
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