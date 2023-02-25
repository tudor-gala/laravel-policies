<!doctype html>
<html>
<head>
  <title>{{ $post->title }}</title>
  @vite('resources/css/app.css')
</head>
<body class="p-5 bg-gray-50">
  <article>
    <h1 class="text-2xl font-bold flex-grow">{{ $post->title }}</h1>

    <author class="text-sm italic opacity-50">Author: {{ $post->author->name ?? '' }}</author>

    <p class="mt-4">{{ $post->body }}</p>
  </article>

  <a href="{{ route('posts.index') }}" class="text-teal-600 hover:text-teal-700 mt-10 block">Go Back</a>
</body>
</html>
