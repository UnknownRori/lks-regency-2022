<x-layout>
    <x-slot name="title">{{ $user->name }}</x-slot>
    <x-slot name="content">
        <div class="container mt-5">
            <div class="col-md-10 m-auto">
                <div class="bg-light rounded shadow p-3">
                    <h3 class="text-center">
                        {{ $user->name }}
                    </h3>
                    <p>User History Content</p>
                    <table class="table table-hover table-light rounded shadow table-responsive-md">
                        <tr>
                            <td>#</td>
                            @if (Auth::user()->admin)
                                <td>Owner</td>
                            @endif
                            <td>Category</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($user->Posts as $data)
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
                                    {{ Str::substr($data->content, 0, 255) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                            Action
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('post.show', $data->id) }}" class="dropdown-item">Show
                                            </a>
                                            <a href="{{ route('post.edit', $data->id) }}"
                                                class="dropdown-item">Edit</a>
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
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
