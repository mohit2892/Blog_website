<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\comment;
use App\Models\post;

class PostComments extends Component
{
    public $post;
    public $name;
    public $comment;

    protected $rules=[
        'name' => 'required|min:5',
        'comment' => 'required|min:2',
    ];
    public function mount(post $post)
    {
        $this->post = $post;
    }
    public function saveComment()
    {
        $this->validate();
        $this->post->comments()->create([
            'name' => $this->name,
            'comment'=>$this->comment,
        ]);
        $this->reset('name','comment');
        setion()->flash('message','comment is done');
    }


    public function render()
    {
        return view('livewire.post-comments');
    }
}
