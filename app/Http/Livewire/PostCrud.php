<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\post;

class PostCrud extends Component
{
    public $posts, $title, $content, $post_id;
    public $isModalOpen = false; 
    public function render()
    {
        $this->posts = post::all();
        return view('livewire.post-crud');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->post_id = null;
    }

    public function store()
    {
        $this->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        Post::updateOrCreate(['id'=> $this->post_id],[
            'title' => $this->title,
            'content'=>$this->content,
        ]);

        session()->flash('message',$this->post_id ? 'post Updated successfully' : 'post created successfully');
        
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $post = post::find($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message','post Deleted successfully');
    }
}


