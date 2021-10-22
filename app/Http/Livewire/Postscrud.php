<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Postscrud extends Component
{
    public $posts;
    public $search = '';


    public function render()
    {
        $this->getPosts();
        return view('livewire.postscrud');
    }

    public function getPosts()
    {
        $posts =
        (empty($this->search)) ?
        Post::all() : 
        Post::where('title','like',"%$this->search%")->get();
    
        $this->posts = $posts;  
    }

    public function delete($id)
    {
        Post::destroy($id);
        $this->getPosts();
    }
}
