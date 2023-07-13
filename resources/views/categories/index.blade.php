<!DOCTYPE html>
<html>
<head>
    <title>News Categories</title>
</head>
<body>
    <h1>News Categories</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{route('categories.show', ['id' => $category['id']])}}">{{$category['name']}}</a></li>
        @endforeach
    </ul>
</body>
</html>
