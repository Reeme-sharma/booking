<div class="container mx-auto p-4">
    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2">Create Post</button>
    @if(session()->has('message'))
    <div class="mt-2 p-2 bg-green-500 text-white">
        {{session('message')}}
    </div>
    @endif
    <table class="w-full mt-4 border">
        <thead>
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Content</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="border p-2">{{ $post->title }}</td>
                <td class="border p-2">{{$post->content}}</td>
                <td class="border p-2">
                    <button wire:click="edit({{$post->id}})" class="bg-yellow-500 text-white px-2 py-1">Edit</button>
                    <button wire:click="delete({{$post->id}})" class="bg-red-500 text-white px-2 py-1">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{ $title }}

    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-grey-800 bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg mb-4">{{ $post_id ? 'edit' : 'create'}}Post</h2>
            <input type="text" wire:model="title" placeholder="title" class="w-full p-2 border mb-2">
            @error('title') <span class="text-red-500">{{$message}}</span>@enderror
            <textarea wire:model="content" placeholder="content" class="w-full p-2 border mb-2"></textarea>
            @error('content') <span class="text-red-500">{{$message}}</span>@enderror
            <button wire:click="store" class="bg-green-500 text-white px-4 py-2">Save</button>
            <button wire:click="closeModal" class="bg-grey-500 text-white px-4 py-2">Cancel</button>
        </div>
    </div>
    @endif
</div>


