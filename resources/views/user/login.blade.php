<x-layout>
    <x-slot name="title">Login</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="col-md-6  m-auto pt-5 mt-5">
                <div class="bg-light p-4 m-3 rounded shadow">
                    <div class="m-auto text-center">
                        <img src="{{ asset('img/Banner.png') }}" alt="" class="img-fluid" width="200 "
                            height="300">
                    </div>
                    <x-form>
                        <x-slot name="route">
                            {{ route('auth') }}
                        </x-slot>
                        <x-slot name="content">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email"
                                    value="{{ old('email') }}" class="form-control" required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter Password"
                                    required class="form-control">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Log in" class="btn btn-primary">
                                <a href="{{ route('user.create') }}" class="mx-2">Didnt have account?</a>
                            </div>
                        </x-slot>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
