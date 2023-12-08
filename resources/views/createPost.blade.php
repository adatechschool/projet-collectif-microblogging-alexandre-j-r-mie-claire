<x-app-layout>



    <div class="mt-6 flex">
        <div class=" mb-4 max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
    <form method="POST" action="{{ route('createPost') }}">
        @csrf

         <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />

            <x-text-input id="content" class="block mt-1 w-full"
                            type="textarea"
                            name="content"
                            required  />

            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />

            <x-text-input id="content" class="block mt-1 w-full"
                            type="file"
                            name="image"
                            required  />

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

      

      
            <x-primary-button class=" mt-3 ml-3" type="submit">
                {{ __('Crée ton post') }}
            </x-primary-button>

        </div>
    </form>



</x-app-layout>