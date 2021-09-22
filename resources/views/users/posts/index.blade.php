@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-8/12">
    <div class="p-6">
      <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
      <p>Posted: {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and
        received {{ $user->receivedLikes->count() }} likes
      </p>
    </div>
    <div class="bg-white p-6 rounded-lg">
      @if($posts->count())
      @foreach($posts as $post)
      <x-post :post="$post" />
      @endforeach

      <!-- Pagination -->
      {{ $posts->links() }}

      @else
      <p>{{ $user->name }} does not have any post!</p>
      @endif
    </div>
  </div>
</div>
@endsection