<x-layout>
    <x-slot name="title">Manage Category</x-slot>
    <x-slot name="content">
        <div class="container mt-3">
            <div class="text-right my-2">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Create New Category</a>
            </div>
            <table class="table table-hover table-light rounded shadow">
                <tr>
                    <td>#</td>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>
                @foreach ($category as $data)
                    <tr>
                        <td>
                            {{ $data->id }}
                        </td>
                        <td>
                            {{ $data->category_name }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                    Action
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('category.edit', $data->id) }}" class="dropdown-item">Edit</a>
                                    <x-form>
                                        <x-slot name="delete"></x-slot>
                                        <x-slot name="route">{{ route('category.destroy', $data->id) }}</x-slot>
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
                <x-slot name="prev">{{ $category->previousPageUrl() }}</x-slot>
                <x-slot name="next">{{ $category->nextPageUrl() }}</x-slot>
            </x-paginate>
        </div>
    </x-slot>
</x-layout>
