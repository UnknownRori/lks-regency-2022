<x-layout>
    <x-slot name="title">Search Posts Category</x-slot>
    <x-slot name="content">
        <div class="container mt-5 pt-5">
            <div class="col-md-8 m-auto">
                <div class="bg-light rounded shadow p-3">
                    <div class="text-center my-2">
                        <h2>Search Posts Category</h2>
                        <img src="{{ asset('img/Banner.png') }}" class="img-fluid" width="100" height="100"
                            alt="">
                    </div>
                    <x-form>
                        <x-slot name="get"></x-slot>
                        <x-slot name="route">{{ route('search.category.post') }}</x-slot>
                        <x-slot name="content">
                            <div class="form-group">
                                <label for="category_id">Post Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary">
                            </div>
                        </x-slot>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
