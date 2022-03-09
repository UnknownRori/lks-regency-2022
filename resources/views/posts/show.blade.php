<x-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>
    <x-slot name="content">
        <div class="container my-3">
            @auth
                @if (Auth::user()->id == $post->users_id)
                    <div class="my-4 text-right">
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                @endif
            @endauth
            <div class="bg-light rounded shadow p-3">
                <h2 class="text-center">
                    {{ $post->title }}
                </h2>
                <div class="text-center m-auto">
                    <img src="{{ Storage::url($post->img) }}" alt="{{ $post->title }}" class="img-fluid"
                        width="300">
                </div>
                <p class="my-2">
                    {{ $post->content }}
                </p>
                <p>
                    Category : {{ $post->category->category_name }}
                </p>
                <p>
                    {{ "{$post->user->name} | {$post->created_at}" }}
                </p>
            </div>
        </div>
    </x-slot>
</x-layout>
