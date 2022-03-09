<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="text-right my-2">
                <a href="{{ route('post.create') }}" class="btn btn-primary">Create New Post</a>
            </div>
            <table class="table table-hover table-light rounded shadow table-responsive-md">
                <tr>
                    <td>#</td>
                    @if (Auth::user()->admin)
                        <td>Owner</td>
                    @endif
                    <td>Category</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Publish Date</td>
                    <td>Action</td>
                </tr>
                @foreach ($posts as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        @if (Auth::user()->admin)
                            <td>
                                {{ $data->user->name }}
                            </td>
                        @endif
                        <td>
                            {{ $data->category->category_name }}
                        </td>
                        <td>
                            {{ $data->title }}
                        </td>
                        <td>
                            {{ Str::substr($data->content, 0, 128) }}
                        </td>
                        <td>
                            {{ $data->created_at }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                    Action
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('post.show', $data->id) }}" class="dropdown-item">Show
                                    </a>
                                    <a href="{{ route('post.edit', $data->id) }}" class="dropdown-item">Edit</a>
                                    <x-form>
                                        <x-slot name="route">{{ route('post.destroy', $data->id) }}</x-slot>
                                        <x-slot name="delete"></x-slot>
                                        <x-slot name="content">
                                            <input type="submit" value="Delete" class="dropdown-item">
                                        </x-slot>
                                    </x-form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <x-paginate>
                <x-slot name="prev">{{ $posts->previousPageUrl() }}</x-slot>
                <x-slot name="next">{{ $posts->nextPageUrl() }}</x-slot>
            </x-paginate>
        </div>
    </x-slot>
</x-layout>
