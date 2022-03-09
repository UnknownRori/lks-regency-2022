<x-layout>
    <x-slot name="title">About us</x-slot>
    <x-slot name="class">gradient</x-slot>
    <x-slot name="content">
        <div class="container pt-5">
            <div class="col-md-11 m-auto">
                <div class=" p-3">
                    <h3 class="text-center">Our Profile</h3>
                    <div class="text-center">
                        <img src="{{ asset('img/Logo.png') }}" alt="" class="img-fluid" height="100" width="100">
                    </div>
                    <p>
                        UsSociate is a social media services Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo, sed
                        quae
                        magni voluptate vitae est tempora deserunt culpa ex quia quisquam, pariatur numquam quo commodi
                        incidunt,
                        facere distinctio. Aliquam, soluta.
                    </p>
                    <br>
                    <h3 class="text-center">Our Feature</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium totam consequatur eos,
                        fugiat quam corporis eveniet blanditiis error quasi animi consequuntur expedita, vero culpa et.
                        Consectetur nesciunt quisquam amet autem?
                    </p>
                    <div class="row p-3 my-3 shadow">
                        <div class="col-md-4 text-center">
                            <span class="fas fa-shield-alt" style="font-size: 48px"></span>
                            <p>Secure</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <span class="fab fa-paypal" style="font-size: 48px"></span>
                            <p>No Payment required</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <span class="fas fa-child" style="font-size: 48px"></span>
                            <p>All Age Content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
