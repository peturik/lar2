<div class="flex justify-center">
    <div class="w-6/12">
        <h3 class="my-10 text-3xl">Comments: {{ count($comments) }}</h3>

        @if (auth()->user())
        <div class="my-4 flex">
            <div>
{{--                <input type="text" class="border shadow p-2 mr-2 my-2" value="{{ auth()->user()->name }}">--}}
            </div>

            <textarea id="" name="editordata" class="border shadow p-2 my-2" placeholder="What's in your mind." wire:model="new_comment" rows="6" cols="45"></textarea>

            <div class="py-2">
                <button class="p-2 bg-light border shadow" wire:click="addComment">Add comment</button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @endif

        @foreach($comment_user as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-start my-2">
                    <p
                        class="text-dark">{{ $comment['user']}}
                        <small class="text-muted">{{ $comment['created_at'] }}</small>
                    </p>
                </div>
                <p class="text-gray-800">{{ $comment['body'] }}</p>
            </div>
        @endforeach

        @foreach($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-start my-2">
                <p
                    class="text-dark">{{ $comment->user->name}}
                    <small class="text-muted">{{ $comment->created_at }}</small>
                </p>
            </div>
            <p class="text-gray-800">{!! $comment->body !!}</p>
        </div>
        @endforeach
    </div>
</div>
