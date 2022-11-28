@if($categories->count())
        
<ol class="list-unstyled mb-0">
    @foreach($categories as $category)
        
            <li>
                <a href="{{ route('category', ['slug' => $category->slug]) }}">
                    {{ $category->title }}
                </a>
            </li>
                
    @endforeach
</ol>

@endif
