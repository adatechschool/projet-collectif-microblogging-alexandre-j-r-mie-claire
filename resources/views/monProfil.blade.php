<x-app-layout>
<div>
    <div class="flex-col flex">




        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md mt-4 ">
            <div class="flex-col">
                <div class="">

                    <div class="flex justify-center">
                    <h1 class="font-bold text-2xl text-gray-700 hover:underline">{{$User->name}}</h1>
                    </div>

                    
                    <div class="flex justify-center">
                        <form method="POST" action="{{ route('updateAvatar') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="file-input">
                            <img class=" flex justify-center w-3 cursor-pointer object-cover w-20 h-20 mx-4 rounded-full sm:block" src="{{ asset('storage/images/'.$User->avatar) }}" />
                        </label>
                    
                        <input class="hidden" id="file-input" name="avatar" type="file"/>
                    </div>
                    <div  class="flex justify-center">
                    <x-primary-button type="submit">
                        {{ __('Modifie ta photo') }}
                    </x-primary-button>
                </div>
                    </form>
  
                </form>
            </div>
                <div class="flex justify-end">
                    <div class="flex flex-col max-w-sm px-6 py-4  bg-white rounded-lg shadow-md">
                        <ul class="-mx-4">


                            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{$User->name}}</li><span class="text-sm font-light text-gray-700">Created {{count($Posts)}} Posts</span></p>
                            </li>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex-col items-center">
                <div class=" mb-4 mx-auto bg-white rounded-lg shadow-md">

                    <h1 class="text-center">Biography</h1>
                    <form method="POST" action="{{ url('/profil/updateBio') }}">
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
                <div class="flex-row items-center justify-between">
                    <!-- Posts Section -->
                    @foreach ($Posts->sortByDesc('created_at') as $post)
                    <x-card-post :post="$post" />
                    @endforeach


                </div>
            </div>
        </div>
    </div>




</x-app-layout>