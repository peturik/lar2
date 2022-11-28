<?php

namespace App\Http\Livewire;

use App\Models\Comment as Model;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $new_comment;
    public $comments;
    public $post_id;
    public $user;

    public $comment_user = [];
    protected  $rules = [
        'new_comment' => 'required|string',
        ];

    public function mount(): void
    {
        $slug = trim(strrchr(url()->current(), '/'), '/');
        $this->post_id = Post::where('slug', $slug)->value('id');
        $this->comments = Model::where('post_id', $this->post_id)->latest()->get();

        $this->user = auth()->user();
    }

    

    public function addComment()
    {
//        dd($this->commentUser);
        $this->validate();

        $setComment = new Model();
        $setComment->user_id = $this->user->id;
        $setComment->body = $this->new_comment;
        $setComment->post_id = $this->post_id;

        if ($setComment->save()) {
            array_unshift($this->comment_user,
                [
                    'body' => $this->new_comment,
                    'created_at' => Carbon::now()->diffForHumans(),
                    'user' => $this->user->name,
                ]
            );
            $this->new_comment = '';
        }
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
