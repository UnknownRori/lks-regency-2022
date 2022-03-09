<x-layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="col-md-10 m-auto">
                @foreach ($posts as $data)
                    <div class="bg-light rounded shadow my-5 hover">
                        <div class="p-2 m-2" id="{{ $data->id }}">
                            <a href="{{ route('post.show', $data->id) }}" class="text-dark text-decoration-none">
                                <h2 class="text-center">
                                    {{ $data->title }}
                                </h2>
                                <div class="text-center m-auto">
                                    <img src="{{ Storage::url($data->img) }}" alt="{{ $data->title }} image"
                                        class="img-fluid text-secondary" width="300" height="300">
                                </div>
                                <p>
                                    {{ Str::substr($data->content, 0, 255) }}
                                </p>
                                <p>
                                    Category : {{ $data->category->category_name }}
                                </p>
                                <p>
                                    {{ "{$data->user->name} | {$data->created_at}" }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
                <x-paginate>
                    <x-slot name="prev">{{ $posts->previousPageUrl() }}</x-slot>
                    <x-slot name="next">{{ $posts->nextPageUrl() }}</x-slot>
                </x-paginate>
            </div>
        </div>
    </x-slot>
</x-layout>
