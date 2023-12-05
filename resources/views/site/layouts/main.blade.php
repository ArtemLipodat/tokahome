<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    @vite('resources/scss/app.scss')
    <title>{{ $page->title }}</title>
</head>
<body>
    @include('.site.header')

    <div class="main" id="app">
        {!! $page->renderBlocks() !!}
    </div>

    @include('.site.footer')
</body>
</html>
