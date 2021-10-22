<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Postscrud extends Component
{
    // use WithPagination;
    // public $posts;
    public $search = '';
    // protected $paginationTheme = 'bootstrap';
    
    // posts
    public $id_post = '';
    public $title = '';
    public $content = '';
 
    public function render()
    {
        $posts = $this->getPosts();
        return view('livewire.postscrud',['posts' => $posts]);
    }

    public function getPosts()
    {
        $posts = 
        ($this->search == '') 
        ? Post::paginate(20)
        : Post::where('title','like',"%$this->search%")->paginate(20);
    
        return $posts;  
    }

    public function delete($id)
    {
        Post::destroy($id);
        $this->getPosts();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->title = $post->title;
        $this->content = $post->content;
        $this->id_post = $post->id;

    }

    public function save()
    {
        $post = Post::find($this->id_post);
        $post->title = $this->title;
        $post->content = $this->content;
        $post->save();

        $this->reset(['id_post','title','content']);


    } 
}
