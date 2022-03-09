<x-layout>
    <x-slot name="title">Search Posts Title</x-slot>
    <x-slot name="content">
        <div class="container mt-5 pt-5">
            <div class="col-md-8 m-auto">
                <div class="bg-light rounded shadow p-3">
                    <div class="text-center my-2">
                        <h2>Search Posts Title</h2>
                        <img src="{{ asset('img/Banner.png') }}" class="img-fluid" width="100" height="100"
                            alt="">
                    </div>
                    <x-form>
                        <x-slot name="get"></x-slot>
                        <x-slot name="route">{{ route('search.title.post') }}</x-slot>
                        <x-slot name="content">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter Posts Title"
                                    class="form-control">
                                @error('title')
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
