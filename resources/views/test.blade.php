<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST" class="search-wrapper" action="{{ route('test') }}">
            @csrf
            <input type="text" id="message" name="message" placeholder="Write Any Questions">
            <button type="submit" class="search-btn">Submit</button>
        </form>
        <div class="result">
            @isset($text)
            {{ $text }}
            @endisset
        </div>
    </div>
</body>

</html>
