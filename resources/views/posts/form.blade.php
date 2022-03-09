<x-layout>
    <x-slot name="title">{{ isset($post) ? "Edit {$post->title}" : 'Create Post' }}</x-slot>
    <x-slot name="content">
        <div class="container pt-4">
            <div class="col-md-10 m-auto">
                <div class="bg-light rounded shadow p-3">
                    <x-form>
                        <x-slot name="route">
                            {{ isset($post) ? route('post.update', $post->id) : route('post.store') }}
                        </x-slot>
                        <x-slot name="enctype">12</x-slot>
                        @if (isset($post))
                            <x-slot name="edit"></x-slot>
                        @endif
                        <x-slot name="content">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter Post Title"
                                    value="{{ isset($post) ? $post->title : old('title') }}" class="form-control"
                                    required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @if (isset($post))
                                        <option value="{{ $post->category_id }}">
                                            {{ $post->category->category_name }}
                                        </option>
                                    @endif
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img">Post Image</label>
                                <input type="file" name="img" id="img">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea name="content" id="content" class="form-control" cols="10"
                                    rows="3">{{ isset($post) ? $post->content : old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="{{ isset($post) ? 'Edit' : 'Create' }}"
                                    class="btn btn-primary">
                            </div>
                        </x-slot>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
