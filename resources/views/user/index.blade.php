<x-layout>
    <x-slot name="title">Manage User</x-slot>
    <x-slot name="content">
        <div class="container mt-2">
            <div class="text-right my-2">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>
            </div>
            <table class="table table-hover table-light rounded shadow table-responsive-md">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                @foreach ($users as $data)
                    <tr>
                        <td>
                            {{ $data->id }}
                        </td>
                        <td>
                            {{ $data->name }}
                        </td>
                        <td>
                            {{ $data->email }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                    Action
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('user.show', $data->id) }}" class="dropdown-item">Show</a>
                                    <a href="{{ route('user.edit', $data->id) }}" class="dropdown-item">Edit</a>
                                    <x-form>
                                        <x-slot name="delete"></x-slot>
                                        <x-slot name="route">{{ route('user.destroy', $data->id) }}</x-slot>
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
                <x-slot name="prev">{{ $users->previousPageUrl() }}</x-slot>
                <x-slot name="next">{{ $users->nextPageUrl() }}</x-slot>
            </x-paginate>
        </div>
    </x-slot>
</x-layout>
