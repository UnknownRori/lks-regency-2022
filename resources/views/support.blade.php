<x-layout>
    <x-slot name="title">Help & Support</x-slot>
    <x-slot name="content">
        <div class="container mt-5 pt-5">
            <div class="col-md-8 m-auto pt-5">
                <div class="bg-light rounded shadow p-3">
                    <h3 class="text-center my-3">Help & Support</h3>
                    <x-form>
                        <x-slot name="route"></x-slot>
                        <x-slot name="content">
                            <div class="row">
                                <div class="col-md-9 m-auto text-center">
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Keyword">
                                </div>
                                <div class="col-md-3 my-2 text-center">
                                    <input type="submit" value="Search" class="btn btn-primary">
                                </div>
                            </div>
                        </x-slot>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
