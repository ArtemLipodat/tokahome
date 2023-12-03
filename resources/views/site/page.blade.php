<!doctype html>
<html lang="en">
<head>
    {!! SEO::generate() !!}
    <title>{{ $item->title }}</title>
    @vite('resources/scss/app.scss')
</head>
<body>
<x-menu/>
<div class="mx-auto max-w-2xl px-5 md:px-0">
    <div class="prose md:prose-lg lg:prose-xl prose-a:font-normal mt-16 first:mt-0">
        @if($item->hasImage('cover'))
            <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
        @endif

        <h1>{{ $item->title }}</h1>
    </div>

    {!! $item->renderBlocks() !!}
</div>
</body>
</html>
