<x-app-layout>
    <x-slot name="header">
        　一覧
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
      <style type="text/css">
      body{
         background-color:#f8f8ff;
         margin:2em;
         padding:4px;
     
      }
      h1.newcreate{
          color:#ff6347;
          font-size:30px;
          background-color:#f0f8ff;
          border-radius:10px;
          display: inline-block;
          text-decoration: underline;
          font-family: "メイリオ" ;

      }
      h1.question{
          color:#ff6347;
          font-size:50px;
          text-align: center;
          border: 1rem solid;
      }
      h2{
          font-weight:bold;
          
      }
      h2.title{
          font-size:20px;
          text-decoration: underline;
      }
      /* li{
          float:left;
      } */
      ul.clearfix:after{
      
          content: "";
          display: block;
          clear: both;
      }

      
      </style>
</head>
<body>
    <h1 class="newcreate"><a href="/questions/create">新規作成</a></h1>
    <h1 class="question">QUESTION</h1>
    <ul>
        @foreach ($questions as $question)
            <li>
                <h2 class="title"><a href="{{ route('questions.show', $question->id) }}">
                    {{ $question->title }}
                </a></h2>
                @php
                    // dd($question->is_anonymous);
                    if ($question->is_anonymous == 1) {
                        $author = '匿名';
                    } else {
                        $author = $question->user->name;
                    }
                @endphp
                <h2>By: {{$author}}</h2>
                <h2 >(Tags)</h2>
                <ul class="clearfix">
                    @foreach ($question->tags as $tag)
                        <li>{{ $tag->name }},</li>
                    @endforeach
                </ul>
                <h2>(Body)</h2>
                <p>{{ $question->body }}</p>
                <h2>(Answers)</h2>
                <ul>
                    @foreach ($question->answers as $answer)
                        <li>{{ $answer->body }}</li>
                    @endforeach
                </ul>
                <br>
            </li>
        @endforeach
    </ul>
    
</body>
</x-app-layout>