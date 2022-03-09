<x-layout>
    <x-slot name="title">{{ isset($category) ? "Edit {$category->category_name}" : 'Create Category' }}</x-slot>
    <x-slot name="content">
        <div class="container mt-5 pt-5">
            <div class="col-md-10 m-auto">
                <div class="bg-light p-3 rounded shadow mt-5 pt-5">
                    <h3 class="text-center">
                        {{ isset($category) ? "Edit Category {$category->category_name}" : 'Create Category' }}</h3>
                    <x-form>
                        <x-slot name="route">
                            {{ isset($category) ? route('category.update', $category->id) : route('category.store') }}
                        </x-slot>
                        @if (isset($category))
                            <x-slot name="edit"></x-slot>
                        @endif
                        <x-slot name="content">
                            <div class="form-group">
                                <label for="category_name">Category</label>
                                <input type="text" name="category_name" id="category_name"
                                    value="{{ isset($category) ? $category->category_name : old('category_name') }}"
                                    placeholder="Enter Category Name" class="form-control" required>
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="{{ isset($category) ? 'Edit' : 'Create' }}"
                                    class="btn btn-primary">
                            </div>
                        </x-slot>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
