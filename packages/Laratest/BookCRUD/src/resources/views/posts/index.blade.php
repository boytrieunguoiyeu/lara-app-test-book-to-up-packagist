<!DOCTYPE html>
<html>
<head>
    <title>Post Index</title>
</head>
<body>
    <h1>Post List</h1>
    <div><a href="{{ route('posts.create') }}">Create</a></div>
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->title }} - {{ $item->author }}
                <a href="{{ route('posts.show', [$item->id]) }}">show</a>
                <a href="{{ route('posts.edit', [$item->id]) }}">edit</a>
                <form action="{{ route('posts.destroy', [$item->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="delete">
                </form>
            </li>
        @endforeach
    </ul>
    <div>{{ $items->links() }}</div>
</body>
</html>