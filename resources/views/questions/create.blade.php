<!DOCTYPE html>
<html>
    <head>
        <title>Create Questions</title>
    </head>
<body>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="body">Body</label>
        <textarea name="body" id="body"></textarea>
        <label for="tags">Tags</label>
        <select multiple name="tags[]" id="tags">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
</body>