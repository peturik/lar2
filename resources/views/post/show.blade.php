@extends('layouts.main')

@section('title', 'Article')

@section('content')


<div class="col-md-8">
    {{ Breadcrumbs::render('post', $post) }}
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
      From the Firehose
    </h3>
  
    

    <article class="blog-post">
        <h2 class="blog-post-title mb-1"><a>{{ $post->title }} </a> </h2>
        <p class="blog-post-meta">
            <span>
                {{ $post->created_at->diffForHumans() }}
                {{-- {{ $post->created_at->toFormattedDateString() }} --}}
            </span>
            by {{ $post->user->name }}</p>
            @if ($post->image)
                <img class="img-post" src="{{ asset('storage') . '/' . $post->image }}" alt="image">
            @endif
        <p>{!! $post->body !!} </p>
        
        <span>Category: <a href="{{ route('category', ['slug' => $post->category->slug]) }}"> {{ $post->category->title }}</a> | Comments: {{ $post->comment->count() }}</span>
            <hr>
    </article>
    
    @livewire('comment')
  
</div>

@endsection