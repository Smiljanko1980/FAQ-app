<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>FAQ</title>
</head>
<body>
    <div id="app">

    </div>
    <script>
        var BASE_URL = '{{ URL::to('/') }}';
    </script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
