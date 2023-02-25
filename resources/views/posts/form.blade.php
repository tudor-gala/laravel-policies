<!doctype html>
<html>
<head>
  <title>{{ isset($post) ? 'Edit' : 'Create' }} Post</title>
  @vite('resources/css/app.css')
</head>
<body class="p-10 bg-gray-50">
  <div class="flex mb-5">
    <h1 class="text-xl font-bold flex-grow">{{ isset($post) ? 'Edit' : 'Create' }} Post</h1>
  </div>

  <form method="post" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" class="space-y-5">
    @csrf
    @if (isset($post))
      @method('PATCH')
    @endif
    <fieldset>
      <label for="title" class="block">Title:</label>
      <input type="text" name="title" id="title" class="focus:ring-teal-500 rounded-md shadow mt-2" value="{{ $post->title ?? '' }}" required>
    </fieldset>

    <fieldset>
      <label for="body" class="block">Body:</label>
      <textarea name="body" id="body" class="focus:ring-teal-500 rounded-md shadow mt-2" required>{{ $post->body ?? '' }}</textarea>
    </fieldset>

    <button type="submit" class="rounded-md bg-teal-500 hover:bg-teal-600 text-white px-2 py-1">Submit</button>
    <button type="button" class="rounded-md bg-gray-400 hover:bg-gray-500 text-white px-2 py-1" onclick="window.location.href = '{{ route('posts.index') }}'">Cancel</button>
  </form>
</body>
</html>
