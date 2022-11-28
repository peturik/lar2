<div>
    <input id="search-input" wire:model="search" class="form-control" type="text" placeholder="Search Posts...">

    <div id="search-modal">
        @if(!$search == '')
            <ul>
                @foreach($posts as $post)
                    <li>
                        <p>
                            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>

                        </p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>




</div>

