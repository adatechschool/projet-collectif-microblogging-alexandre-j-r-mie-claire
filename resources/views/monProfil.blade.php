<x-app-layout>

    <div class="flex-col flex">




        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md mt-4 ">
            <div class="flex-row">
                <div class=" flex justify-center ">



                    <form method="POST" action="{{ url('/monProfil/{$User->id}') }}">
                        @csrf
                        <div class="flex-col">
                            <h1 class="font-bold text-2xl text-gray-700 hover:underline">Alex John</h1>
                            <label for="avatar">
                                <img class="w-3 cursor-pointer object-cover w-20 h-20 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;w=1780&amp;q=80" />
                            </label>

                            <input class="hidden" id="file-input" name="avatar" type="file" />
                            <div class="flex justify-center">
                                <x-primary-button type="submit">
                                    {{ __('Modifie ta photo') }}
                                </x-primary-button>
                            </div>
                        </div>
                </div>
                </form>
                <div class="flex justify-end">
                    <div class="flex flex-col max-w-sm px-6 py-4  bg-white rounded-lg shadow-md">
                        <ul class="-mx-4">


                            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</li><span class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                            </li>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex-col items-center">
                <div class=" mb-4 mx-auto bg-white rounded-lg shadow-md">

                    <h1 class="text-center">Biography</h1>
                    <form method="POST" action="{{ url('/monProfil/{$User->id}') }}">
                        @csrf
                        <div class="flex justify-center">


                            <div>
                                <textarea :autosize="true" rows="4" cols="50" id="biography" name="biography" type="textarea">{{$User->biography}}
                                </textarea>

                            </div>
                        </div>
                        <divflex class="flex justify-end items-end">
                            <x-primary-button class=" mt-3 ml-3 " type="submit">
                                {{ __('Modifie ta bio') }}
                            </x-primary-button>
                </div>

                </form>
            </div>


            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold mx-auto text-gray-700 md:text-2xl">Post</h1>

                </div>
                <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md mt-4">
                    <div class="flex items-center justify-between"><span class="font-light text-gray-600">Jun 1,
                            2020</span><a href="#" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                    </div>
                    <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Build
                            Your New Idea with Laravel Freamwork.</a>
                        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                            reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                    </div>


                </div>
            </div>
        </div>




</x-app-layout>