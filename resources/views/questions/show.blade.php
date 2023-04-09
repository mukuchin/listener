<!DOCTYPE html> 
<html>
<head>
    <title>Question{{$question->id}}</title>
</head>
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
    
    <h2><a href="/questions/{{$question->id}}">回答する</a></h2>
    
    <h2>Answers</h2>
    <ul>
        @foreach ($question->answers as $answer)
            @if ($answer->answer_id == null)
                <li>{{ $answer->body }}</li>
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