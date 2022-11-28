@extends('layouts.main')

@section('title', 'Blog')

@section('content')

<div class="col-md-8">
  <h3 class="pb-4 mb-4 fst-italic border-bottom">
    @if (isset($category))
      {{ $category->title }}
      @if ($posts->count() <= 0) 
          <hr>
          <p>There is not available article yet</p>
      @endif
    @else
      From the Firehose
    @endif
  </h3>

  @if ($posts)
    @foreach ($posts as $post)
        <article class="blog-post">
            <h2 class="blog-post-title mb-1"><a href="{{ route('post', $post->slug) }}
              ">{{ $post->title }} </a> </h2>
            <p class="blog-post-meta">
                <span>
                    {{ $post->created_at->diffForHumans() }}
                    {{-- {{ $post->created_at->toFormattedDateString() }} --}}
                </span>
                by {{ $post->user->name }}</p>
                @if ($post->image)
                    <img class="img-post" src="{{ asset('storage') . '/' . $post->image }}" alt="image">
                @endif
            <p class="article-body">{!! $post->body !!} </p>
            
            <span>Category: <a href="{{ route('category', ['slug' => $post->category->slug]) }}"> {{ $post->category->title }} </a></span>
            <hr>
        </article>
    @endforeach 
  @endif

  {{ $posts->links('pagination::bootstrap-5') }}
  {{-- <nav class="blog-pagination" aria-label="Pagination">
    <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
    <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
  </nav> --}}

</div>


@endsection
