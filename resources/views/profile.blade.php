<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-6 md:p-12 text-center md:text-left shadow-lg rounded-md" style="background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background2.jpg)">
                    <div class="flex justify-center">
                        <div class="max-w-3xl">
                            <div class="block p-6 rounded-lg shadow-lg bg-white m-4">
                                <div class="my-8">
                                    <div
                                        class="md:w-96 w-44 flex justify-center items-center mb-6 lg:mb-8 mx-auto md:mx-0"
                                    >
                                        <img
                                            src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg"
                                            class="rounded-full shadow-md"
                                            alt="..."
                                        />
                                    </div>
                                    <div>
                                        <p class="font-semibold text-xl mb-2 text-gray-800">{{ Auth::user()->name }}</p>
                                        <p class="font-semibold text-gray-500 mb-6">Product manager</p>
                                        <p class="text-gray-500 font-light mb-6">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id quam sapiente
                                            molestiae numquam quas, voluptates omnis nulla ea odio quia similique corrupti
                                            magnam.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>