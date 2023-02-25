<!doctype html>
<html>
<head>
  <title>Blog Index</title>
  @vite('resources/css/app.css')
</head>
<body class="p-5 bg-gray-50">
  <div class="flex pb-5">
    <h1 class="text-2xl font-bold flex-grow">Blog Index</h1>
    @can('create', \App\Models\Post::class)
    <a href="{{ route('posts.create') }}" class="shadow border bg-teal-500 hover:bg-teal-600 text-white rounded-md px-2 py-1">New Post</a>
    @endcan
  </div>
  @foreach($posts as $post)
    <article class="border-t py-10">
      <div class="flex">
        <a href="{{ route('posts.show', $post) }}" class="text-teal-600 hover:text-teal-700 text-lg font-bold flex-grow">{{ $post->title }}</a>

        @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}" class="bg-teal-500 hover:bg-teal-600 text-white px-2 rounded-md leading-7">Edit Post</a>
        @endcan

        @can('delete', $post)
        <form method="post" action="{{ route('posts.destroy', $post) }}" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 rounded-md leading-7 ml-2" onclick="return confirm('Delete this post?')">Delete Post</button>
        </form>
        @endcan
      </div>

      <author class="text-sm italic opacity-50">Author: {{ $post->author->name ?? '' }}</author>

      <p class="mt-4">{{ Illuminate\Support\Str::excerpt($post->body) }}</p>
    </article>
  @endforeach
</body>
</html>
