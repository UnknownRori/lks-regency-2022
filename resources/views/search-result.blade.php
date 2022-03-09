<x-layout>
    <x-slot name="title">Search Result</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="col-md-10 m-auto">
                @foreach ($posts as $data)
                    <div class="bg-light rounded shadow my-5 hover">
                        <div class="p-2 m-2">
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
                                    {{ "{$data->user->name} | {$data->created_at}" }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-layout>
